(function ($, Drupal, drupalSettings) {

  var frontbackRepo = drupalSettings.frontback.repo_id;
  var frontbackPostURL = drupalSettings.frontback.endpoint;
  var frontbackVersion = drupalSettings.frontback.version;

  var s = document.createElement('script'),
      x = document.getElementsByTagName('script')[0];
  var script = document.createElement('script');
  script.src = frontbackPostURL + '/assets/js/frontback.js?v=' + frontbackVersion;
  document.body.appendChild(script);

})(jQuery, Drupal, drupalSettings);
