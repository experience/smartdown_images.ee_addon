# SmartDown Images
The SmartDown Images extension uses SmartDown's [extension hooks][hooks] to
implement support for the [Matrix][matrix] and [NSM Transplant][nsm_transplant]
[image replacement technique][image_video].

The extension is only required in the following very specific situation:

1. Your content uses the aforementioned image replacement technique;
2. Your content includes ExpressionEngine code samples, requiring you to set
   [the `ee_tags:encode` option][usage] to TRUE.

## Requirements
* PHP 5.
* [SmartDown][smartdown], obviously.

## Installation
1. Extract the ZIP file.
2. Copy the `third_party/smartdown_images` folder to your
   `/system/expressionengine/third_party/` directory.
3. If you're installing SmartDown Images for the first time, open [the
   Extensions Manager][manager], and enable the extension.

[manager]:http://expressionengine.com/user_guide/cp/add-ons/extension_manager.html "The ExpressionEngine extensions manager."
[smartdown]:http://experienceinternet.co.uk/software/smartdown/ "Read more about SmartDown"
[hooks]:{path=software/smartdown/docs/smartdown-extension-hooks} "Read more about SmartDown's extension hooks"
[image_video]:http://vimeo.com/18661374 "A video guide to the Matrix / NSM Transplant image replacement technique"
[matrix]:http://pixelandtonic.com/matrix/ "Flaming BK"
[nsm_transplant]:http://ee-garage.com/nsm-transplant "Flaming Australians"
[usage]:{path=software/smartdown/docs/smartdown-usage} "SmartDown usage instructions"
