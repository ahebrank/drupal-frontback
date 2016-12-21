(function ($, Drupal, drupalSettings) {

  window.frontback = {
    repo: drupalSettings.frontback.repo_id,
    postUrl: drupalSettings.frontback.endpoint
  };
  var frontbackVersion = drupalSettings.frontback.version;

  var s = document.createElement('script'),
      x = document.getElementsByTagName('script')[0];
  var script = document.createElement('script');
  script.src = frontback.postUrl + '/assets/js/frontback.js?v=' + frontbackVersion;
  document.body.appendChild(script);

})(jQuery, Drupal, drupalSettings);
