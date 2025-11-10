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

Example that should work if you copy it to your own workflow (eg. .github/workflow/.build-push-deploy.yml):
```
name: Build, Push & Deploy 

on:
  push:
    branches: [ develop, master ]
  workflow_dispatch:

# Needed so GITHUB_TOKEN can publish to GHCR
permissions:
  contents: read
  packages: write

env:
  IMAGE_NAME: handle-oas
  AWX_JOB_URL: ${{ secrets.AWX_JOB_URL }}
  PRODUCTION_BRANCH: master

jobs:
  build-push-ghcr:
    uses: LeidenUniversityLibrary/container-deploy-awx-action/.github/workflows/build-push-ghcr.yml@master
    secrets: inherit
  
  deploy-awx:
    needs: build-push-ghcr
    if: github.ref_name == 'develop'
    uses: LeidenUniversityLibrary/container-deploy-awx-action/.github/workflows/awx-deploy.yml@master
    with:
      image: ${{ needs.build-push-ghcr.outputs.image }}
      image_tag: ${{ needs.build-push-ghcr.outputs.branch_tag }}
    secrets: inherit  
```