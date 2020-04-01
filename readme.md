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
* Navigate to `Settings > Malcolm!` and fill in your Instance ID.

## Usage

Use MyMalcolm to configure your embeds and if required restrict them to the 
URL of your Wordpress site.

Widget Embeds will automatically show according 
to the rules set in MyMalcolm.

Inline and Popup Embeds will need an additional Wordpress short code added 
where you would like them to be displayed.

### `[malcolm_inline "xxxxxxxxxx"]`

Create a container for an Inline Embed with Embed ID `xxxxxxxxxx`.

### `[malcolm_popup "xxxxxxxxxx"]`

Create a container for a Popup Embed with Embed ID `xxxxxxxxxx`.
