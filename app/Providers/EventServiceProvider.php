<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Session;
use Slides\Saml2\Events\SignedIn;
use App\Models\User;
use Slides\Saml2\Events\SignedOut;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     * We listen for a SAML-login event and then (temporarily) store the received user data in our database.
     * User's data must not be stored in the database indeterminately for privacy and security reasons.
     */
    public function boot(): void
    {
        Event::listen(SignedIn::class, function (SignedIn $event) {
            $messageId = $event->getAuth()->getLastMessageId();
            $samlUser = $event->getSaml2User();
            $userData = [
                'id' => $samlUser->getUserId(),
                'attributes' => $samlUser->getAttributes(),
                'assertion' => $samlUser->getRawSamlAssertion()
            ];

            /* EXAMPLE: check if user is allowed access (staff or LUMC (= guest with role G130))
            if (!($userData['attributes']['/UserAttribute[@ldap:targetAttribute="ULCNuserCLass"]'][0] === 'staff' ||
                ($userData['attributes']['/UserAttribute[@ldap:targetAttribute="ULCNuserCLass"]'][0] === 'guest' &&
                    $userData['attributes']['/UserAttribute[@ldap:targetAttribute="ULCNUserRole"]'][0] === 'G130')
            )){
                abort(403, 'Only university and LUMC staff have access to this website');
            }
            */


            //NOTE: We have the SAML data (ULCN username, email, etc.) We now must store it somewhere.
            //We will store the user's detail in the database.
            //In the database, search for the first occurrence of 'cn'
            $user = User::where('cn', $userData['attributes']['/UserAttribute[@ldap:targetAttribute="cn"]'][0])->first();
            //if a user is found, make sure that its data is synced between what the ULCN has and what we have in our database:
            if ($user) {
                $user->update([
                    'fullName' => $userData['attributes']['/UserAttribute[@ldap:targetAttribute="fullName"]'][0],
                    'ULCNuserCLass' => $userData['attributes']['/UserAttribute[@ldap:targetAttribute="ULCNuserCLass"]'][0],
                    'ulcnmailCorrespondence' => $userData['attributes']['/VirtualAttribute[@ldap:targetAttribute="ULCNmailCorrespondence"]'][0],
                    'preferredName' => $userData['attributes']['/UserAttribute[@ldap:targetAttribute="preferredName"]'][0],
                    'sn' => $userData['attributes']['/UserAttribute[@ldap:targetAttribute="sn"]'][0],
                    /* EXAMPLE: additional fields that can be requested to ULCN. Make sure the database migrations reflect these entries

                    'ULCNp1UserOrgLevel1' => $userData['attributes']['/UserAttribute[@ldap:targetAttribute="ULCNp1UserOrgLevel1"]'][0] ?? null,
                    'ULCNp1UserOrgLevel2' => $userData['attributes']['/UserAttribute[@ldap:targetAttribute="ULCNp1UserOrgLevel2"]'][0] ?? null,
                    'ULCNp1UserOrgLevel3' => $userData['attributes']['/UserAttribute[@ldap:targetAttribute="ULCNp1UserOrgLevel3"]'][0] ?? null,
                    'ULCNp1UserOrgLevel4' => $userData['attributes']['/UserAttribute[@ldap:targetAttribute="ULCNp1UserOrgLevel4"]'][0] ?? null,
                    */
                ]);
            } else {
                //if a user doesn't exist (never used the app), then store the user:
                $user = User::create([
                    'cn' => $userData['attributes']['/UserAttribute[@ldap:targetAttribute="cn"]'][0],
                    'fullName' => $userData['attributes']['/UserAttribute[@ldap:targetAttribute="fullName"]'][0],
                    'ULCNuserCLass' => $userData['attributes']['/UserAttribute[@ldap:targetAttribute="ULCNuserCLass"]'][0],
                    'ulcnmailCorrespondence' => $userData['attributes']['/VirtualAttribute[@ldap:targetAttribute="ULCNmailCorrespondence"]'][0],
                    'preferredName' => $userData['attributes']['/UserAttribute[@ldap:targetAttribute="preferredName"]'][0],
                    'sn' => $userData['attributes']['/UserAttribute[@ldap:targetAttribute="sn"]'][0],
                    /* EXAMPLE: additional fields that can be requested to ULCN. Make sure the database migrations reflect these entries

                    'ULCNp1UserOrgLevel1' => $userData['attributes']['/UserAttribute[@ldap:targetAttribute="ULCNp1UserOrgLevel1"]'][0] ?? null,
                    'ULCNp1UserOrgLevel2' => $userData['attributes']['/UserAttribute[@ldap:targetAttribute="ULCNp1UserOrgLevel2"]'][0] ?? null,
                    'ULCNp1UserOrgLevel3' => $userData['attributes']['/UserAttribute[@ldap:targetAttribute="ULCNp1UserOrgLevel3"]'][0] ?? null,
                    'ULCNp1UserOrgLevel4' => $userData['attributes']['/UserAttribute[@ldap:targetAttribute="ULCNp1UserOrgLevel4"]'][0] ?? null,
                    */
                ]);
            }
            //Now we log in using Auth and the user's data The redirect is managed by the SAML2 plugin.
            Auth::login($user);
        });

        //When a user clicks on the logout button we initiate a Logout Request. This request is sent to ULCN (our IdP).
        //If the logout is properly processed by ULCN, the user will be automatically redirected to the app's home page.
        //This redirect will carry a message from ULCN on the lines of "user successfully logged out."
        //Here we listen for that message, and destroy the local sessions.

        Event::listen(SignedOut::class, function (SignedOut $event) {
            $cn = Auth::user()->cn;
            Auth::logout();
            DB::delete('delete from users where cn = ?', [$cn]);
            Session::save();
        });
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
