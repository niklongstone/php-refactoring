<?php

$this->addTextField('Webcast title', 'title', "Enter the title of your webcast in less than 80 characters. What you enter will be displayed in your channel. So try to make it short, distinctive and self explanatory.", '', 80);
if ($this->includeRevertSyndicationOverrides()) {
$this->addMarkupField('revertTitle', '<div class="revertContainer"><span id="revertTitle" class="revertOverrideButton" />Revert webcast title</span><input type="hidden" class="revertTarget" value="title" /></div>');
}

$this->addLongTextField('Description', 'description', "Enter here a brief synopsis of the webcast. Keeping this description relevant to the content of the webcast will make it easier for viewers to search for it.", '', 2000);
if ($this->includeRevertSyndicationOverrides()) {
$this->addMarkupField('revertDescription', '<div class="revertContainer"><span id="revertDescription" class="revertOverrideButton" />Revert description</span><input type="hidden" class="revertTarget" value="description" /></div>');
}

if($this->showSeoPreview()){
$this->addMarkupField('seoPreview', '<div id="toggleSeoPreviewContainer"><span id="toggleSeoPreview">SEO preview: See how this will look in search results</span></div><div id="seoPreviewWrapper"><div id="seoPreviewContainer"></div><div id="seoPreviewHelpText">BrightTALK has optimized our site to help your content be found by search engines. Take advantage of this by including relevant keywords in your title, description and tags.</div></div>');
}

$this->addTextField('Presenter', 'presenter', "Enter here, the name(s) of the presenter(s) who will be delivering the webcasts. Role and company can be included also.", '', 125);
if ($this->includeRevertSyndicationOverrides()) {
$this->addMarkupField('revertPresenter', '<div class="revertContainer"><span id="revertPresenter" class="revertOverrideButton" />Revert presenter</span><input type="hidden" class="revertTarget" value="presenter" /></div>');
}

$durationOptions = $this->getDurationMinutesOptionsDefault();
$this->addChoiceField('Duration', 'durationMinutes', "Enter here the duration of your webcast in minutes. Try to be as accurate as possible! Book out too long and it could frustrate your audience who have booked your webcast into their schedule. Book out too little and the webcast will end automatically on a timer and could cut your presenters short.", $durationOptions);

$this->addDateField('Start date', 'startDate', "Select the date your live webcast will take place on.", "M d Y");

list($hourOptions, $minOptions) = $this->getStartTimeOptions();
$this->addTimeField('Start time', 'startTimeHours', 'startTimeMinutes', "Enter the time your live webcast will take place.", $hourOptions, $minOptions);

if ($this->isDebugMode()) {
$this->durationMinutes->type = Form::TEXT_FIELD;
$this->startTimeHours->type = Form::TEXT_FIELD;
$this->startTimeMinutes->type = Form::TEXT_FIELD;
}

$timezoneOptions = $this->getTimezoneOptions();
$this->addChoiceField('Timezone', 'timezone', "The time zone you select here should be based on where your presenter intends to present from. This will determine the local dial-in number generated for your presenter. NOTE: This will NOT affect how your webcast is listed. Webcasts are always listed in your player and on BrightTALK in the local time of your viewers.", $timezoneOptions);

$this->addKeywordsField('Tags', 'keywords', "Enter here 4 or 5 terms that cover the main topics and themes you will be webcasting on. Simply put a space between your tags. If you want to add a phrase enclose with ''''. Example: advertising promotion ''digital marketing''.", '', 52);
if ($this->includeRevertSyndicationOverrides()) {
$this->addMarkupField('revertKeywords', '<div class="revertContainer"><span id="revertKeywords" class="revertOverrideButton" />Revert tags</span><input type="hidden" class="revertTarget" value="keywords" /></div>');
}

$featureImageLabel = "Upload Feature Image (" . $this->featureImageWidth . "x" . $this->featureImageHeight . " pixels)";
if ($this->isReadOnly()) {
$featureImageLabel = "Feature Image";
}
$this->addFileField($featureImageLabel, 'featureImage', 'This will be used for the click to play overlay and thumbnail. Upload JPG/PNG image file of size '.$this->featureImageWidth.'x'.$this->featureImageHeight.'. File upload limit '.$this->featureImageSize.'MB.', false);

//Publishing section of the form
$this->addMarkupField('fieldEnd', '<div class="clear"></div></div>');
$this->addMarkupField('fieldStart', '<h3>Publishing</h3><div class="managechannel-box">');

    if($this->isManagerViewing()){
    $bookingTypeOptions = array('within' => 'Within channel\'s content plan', 'outside' => 'Outside channel\'s content plan');
    $this->addChoiceField('Booking type', 'bookingType', "Select whether this booking is within this channel's content plan (default) or outside this channel's content plan.", $bookingTypeOptions);
    }

    $this->getVisibilityField();

    $publishStatusOptions = array('published'=>'Publish', 'unpublished'=>'Unpublish');
    $this->addChoiceField('Published', 'publishStatus', "Select 'Unpublish' to ensure your recorded webcast cannot be viewed by audience members.<br />Select 'Publish' to make it available to be viewed by audience members.<br />Optionally use “Set unpublish date” to make published content automatically unpublish at a time in the future or “Set publish date” to automatically publish unpublished content at a time in the future.", $publishStatusOptions);

    if ($this->isEditMode() && $webcast->isNotSyndicatedWebcast() || $this->isReadOnly()) {
    $this->setScheduledPublication($webcast);
    }

    if($this->showChannelSurveyOption()){
    $surveyOptions = array('true' => 'Enabled for this webcast', 'false' => 'Disabled for this webcast');
    $this->addChoiceField('Channel survey', 'channelSurvey', 'To require your audience to complete your channel survey to access this webcast keep the channel survey \'Enabled for this webcast\'. If you do NOT want your audience to complete your channel survey to access this webcast select \'Disabled for this webcast\'.', $surveyOptions);
    }

    $this->addTextField('Campaign reference', 'clientBookingReference', "Optional. Add your organization’s own campaign or booking reference that relates to this webcast. This information will NOT be publicly exposed to your audience. It will be included in your channel’s reporting to help you reconcile your webcasting activity with your internal systems/processes.", '', 255, null, false);
    //if the webcast is read only mode and the client booking reference is null,
    // we unset the field so it does not show empty on portal
    if($this->isReadOnly() && is_null($webcast->clientBookingReference)) {
    unset($this->clientBookingReference);
    }

    if($this->isEditMode()) {
    $this->addDisplayField('Webcast URL','url',$webcast->webcastUrl, 'This link is the URL that will be used by the add to calendar file, email service, social media posts and RSS feed &amp; widget links to direct your audience to this webcast.');
    }

    if($this->showRedirectionUrl()){
    $this->addMarkupField('locationUrlChangeSpan', "<span id='changeWebcastUrl'>Change</span>");
    $this->addMarkupField('locationUrlStaticText', '<div id="webcastUrlContainer" class="formItem">');
        $this->addMarkupField('customLocationUrlLabel', '<label id="customUrlLabel">New webcast URL:</label>');
        $this->addUrlField('', 'webcastUrl', null, '', null, false);
        $this->addMarkupField('revertWebcastUrl', '<div id="revertWebcastUrlContainer"><span id="revertWebcastUrl">Revert to default webcast URL</span></div>');
        $this->addHiddenField('channelWebcastUrl');
        $this->addMarkupField('locationUrlNotice', '<div id="locationUrlNotice" class="form-item"><b>IMPORTANT:</b> If you need to change this URL it is essential to ensure the webcast is first embedded at this location. This URL will be used to direct your audience throughout the upcoming, live and recorded phases of this webcast.</div>');
        $this->addMarkupField('locationUrlStaticTextEnd', '</div>');
    }

    if ($this->showAnonymousOption()) {
    $allowAnonymousOptions = array('false'=>'Registration', 'true'=>'No registration');
    $this->addChoiceField('Viewer access', 'allowAnonymous', 'To require your audience to be registered subscribers to access this webcast select \'Registration\'. To remove registration and offer direct and open access select \'No registration\' (Note this will introduce viewings from \'Not subscribed\' users into your reporting).', $allowAnonymousOptions);
    }

    //hidden fields
    $this->addHiddenField('status');

    // need this so the timezone drop down on theform defaults to the users timezone.
    if($this->isCreateMode()) {
    unset($this->publishStatus);
    $this->bind(array('startTimeHours'=>'', 'startTimeMins'=>'', 'timezone'=>$this->getUserTimezone()));
    }

    //if we have a webcast with details in it (i.e. we are editing an existing
    //webcast, populate the form with its details
    if (isset($webcast)) {
    $this->populate($webcast);
    }

    //ready only view of the form, so do things like hide some fields
    //and format other fields
    if($this->isReadOnly()) {
    unset($this->formItems['channelWebcastUrl']);
    $this->durationMinutes->value .= ' min';
    }

    //if we don't have a feature images uploaded, then just hide the field
    if ($this->isReadOnly() && empty($webcast->featureImage)) {
    unset($this->featureImage);
    }

    if (!empty($webcast->featureImage)) {
    $this->featureImage->existingUrl = $webcast->featureImage;
    }
    }