<br />
<div align="center">
  <a href="https://github.com/LeidenUniversityLibrary/container-deploy-awx-action">
    <img src="README/ul_logo.png" alt="Leiden University Libraries logo" height="160">
  </a>

<h3 align="center"> Container Deploy AWX Action </h3>
</div>

## About the project

Repository for reusable GitHub Action to be used to deploy containers onto a given server. Launches an AWX job, managed by ISSC-OAS.

## Requirements
- Running and connect OAS GitHub runner
- AWX_JOB_URL and AWX_TOKEN of appropriate AWX job (handed out by OAS) set up as Environment Secrets
- Valid Docker-/Containerfile
- ENV_FILE_CONTENT set up as an Environment Secret (if you're planning on using that)

## Examples

See "examples" folder. These examples should work if you copy one of them to your own workflow file. (eg. .github/workflows/.build-push-deploy.yml):
