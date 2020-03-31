Malcolm! Wordpress Plugin
=========================

## Introduction

A Wordpress plugin for embedding Malcolm! pages.

## Installation

### Via Wordpress

1. [Download the plugin](https://github.com/acknet/malcolm-wp-plugin/archive/master.zip) 
as a ZIP archive and save it to your computer.
1. Login to your Wordpress Admin and navigate to `Plugins > Add New`.
1. Click the `Upload Plugin` button.
1. Choose the ZIP archive from your computer and click `Install Now`.

### Via Git

If your Wordpress site is within a Git repository you can install the plugin 
using the `git submodule` command:

    git submodule add git@github.com:acknet/malcolm-wp-plugin wp-content/plugins/malcolm-wp-plugin

Commit the changes to the `.gitmodules` file, commit the submodule and push the 
changes.

    git add .gitmodules wp-content/plugins/malcolm-wp-plugin
    git commit
    git push

After pulling the changes on your server use the `git submodule` 
command to pull down the contents of this repository.

    git pull
    git submodule update --init --recursive

## Setup

* Open the Wordpress admin.
* Navigate to `Plugins` and activate the plugin.
* Navigate to `Settings > Malcolm!` and fill in your instance URL.
* If desired alter the default styling options.

## Usage

To embed a Malcolm! page into your Wordpress site use the following short codes:

### `[malcolm_faq "how-to-make-a-claim"]`

Embed a Malcolm! FAQ passing the short name of the FAQ as an argument.

### `[malcolm_workflow "make-a-claim"]`

Embed a Malcolm! workflow passing the short name of the workflow as an argument.

### `[malcolm_popular]`

Embed your most popular Malcolm! FAQs and Workflows listing.
