# Asset Plugin for [Morfy CMS](http://morfy.org/)

![version](https://img.shields.io/badge/version-2.0.0-brightgreen.svg?style=flat-square "Version")
![DLE](https://img.shields.io/badge/Morfy-2.x-green.svg?style=flat-square "Morfy Version")
[![MIT License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://github.com/pafnuty/morfy-plugin-asset/blob/master/LICENSE)

The plugin to automatically connect CSS and JS files in the site template.



## Advantages
- Easy use.
- Small size.
- Add `?v=XXX` for links to files.
- The ability to add files with their attributes (For example async).


## Install & Configuration
See [this instruction](http://morfy.org/documentation/plugins/plugins-installation)


## Config

```yml
# Prefix of files to exclude
excludes:
  - '-'
  - '_'

# The folder relative to the root of the current template, 
# which will be connected files (uncomment if necessary)

# folders:
#   - '/assets/js/'
#   - '/assets/css/
```

## Very Simple Example
1. Uncomment folders config
```yml
# folders:
#   - '/assets/css/'
#   - '/assets/js/'
```

```smarty
<!-- In Template:  -->
{Action::run('asset_folder')}

<!-- In Browser: -->
<link rel="stylesheet" href="/themes/default/assets/css/bootstrap.min.css?v=1447304405">
<link rel="stylesheet" href="/themes/default/assets/css/theme.css?v=1447304405">
<script src="/themes/default/assets/js/jquery.min.js?v=1447306322"></script>
<script src="/themes/default/assets/js/bootstrap.min.js?v=1447306322"></script>

```


## A more complex example

### In Template
```smarty
<!-- css -->
{Action::run('asset_folder', [['/assets/css/']])}
{Action::run('asset_file', ['/assets/css/hljs/zenburn.css'])}
<!-- /css -->
...
<!-- js -->
{Action::run('asset_folder', [['/assets/js/'], ['main']])}
{Action::run('asset_file', ['/assets/js/myasyncfile.js', 'async defer class="async-file"'])}
{Action::run('asset_file', ['/assets/js/main.js'])}
<!-- /js -->
```

### In Browser
```html
<!-- css -->
<link rel="stylesheet" href="/themes/mytheme/assets/css/base.css?v=1447304405">
<link rel="stylesheet" href="/themes/mytheme/assets/css/main.css?v=1447306321">
<link rel="stylesheet" href="/themes/mytheme/assets/css/hljs/zenburn.css?v=1447306328">
<!-- /css -->
...
<!-- js -->
<script src="/themes/mytheme/assets/js/highlight.pack.js?v=1447306322"></script>
<script src="/themes/mytheme/assets/js/jquery.formstyler.min.js?v=1447306322"></script>
<script src="/themes/mytheme/assets/js/jquery.matchHeight-min.js?v=1447306322"></script>
<script src="/themes/mytheme/assets/js/myasyncfile.js?v=1447306322" async defer class="async-file"></script>
<script src="/themes/mytheme/assets/js/main.js?v=1447306523"></script>
<!-- /js -->
```


## License 
[MIT](https://github.com/pafnuty/morfy-less/blob/master/LICENSE)