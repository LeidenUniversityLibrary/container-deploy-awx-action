<br />
<div align="center">
  <a href="https://github.com/LeidenUniversityLibrary/container-deploy-awx-action">
    <img src="README/ul_logo.png" alt="Leiden University Libraries logo" height="160">
  </a>

<h3 align="center"> Container Deploy AWX Action </h3>
</div>

## About the project

Repository for reusable GitHub Action to be used to deploy containers onto a given server. Launches an AWX job, managed by ISSC-OAS.

## Example

Example where this is used:
https://github.com/LeidenUniversityLibrary/handle-service/blob/development/.github/workflows/.build-push-deploy.yml

Code snippet calling the action:
 ```  deploy-awx:
    needs: build-push
    if: github.ref_name == 'development'
    uses: LeidenUniversityLibrary/container-deploy-awx-action/.github/workflows/awx-deploy.yml@master
    with:
      job_template_id: 38
      image: ${{ needs.build-push.outputs.image }}
      image_tag: ${{ needs.build-push.outputs.branch_tag }}
      registry_user: ${{ github.actor }}
    secrets: inherit
```