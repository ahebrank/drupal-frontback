<?php

namespace Drupal\frontback\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Settings form for module.
 */
class FrontbackSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'frontback_admin_configuration';
  }

  /**
   * Gets the configuration names that will be editable.
   *
   * @return array
   *   An array of configuration object names that are editable if called in
   *   conjunction with the trait's config() method.
   */
  protected function getEditableConfigNames() {
    return ['frontback.admin_settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $admin_configurations = $this->config('frontback.admin_settings');
    $form['frontback_repo_id'] = [
      '#type' => 'textfield',
      '#title' => t('Repo ID'),
      '#default_value' => $admin_configurations->get('frontback_repo_id') ? $admin_configurations->get('frontback_repo_id') : '',
      '#size' => 60,
      '#maxlength' => 60,
      '#description' => t("Homepage for the repo you want to target."),
      '#required' => TRUE,
    ];
    $form['frontback_endpoint'] = [
      '#type' => 'textfield',
      '#title' => t('Frontback Endpoint URL'),
      '#description' => t("Frontback proxy endpoint"),
      '#default_value' => $admin_configurations->get('frontback_endpoint') ? $admin_configurations->get('frontback_endpoint') : '',
      '#required' => TRUE,
    ];
    $form['hide_button'] = [
      '#type' => 'checkbox',
      '#title' => t('Hide Button'),
      '#description' => t("Hide Feedback button but run script (useful for config split / local dev situations)"),
      '#default_value' => $admin_configurations->get('hide_button'),
    ];
    $form['show_on_nonadmin_routes'] = [
      '#type' => 'checkbox',
      '#title' => t('Use Feedback on non-admin routes'),
      '#description' => t("Show on the front end"),
      '#default_value' => $admin_configurations->get('show_on_nonadmin_routes'),
    ];
    $form['show_on_admin_routes'] = [
      '#type' => 'checkbox',
      '#title' => t('Use Feedback on admin routes'),
      '#description' => t("Show on the back end"),
      '#default_value' => $admin_configurations->get('show_on_admin_routes'),
    ];
    $form['hide_for_pages'] = [
      '#type' => 'textarea',
      '#title' => t('Hide Feedback on specific pages'),
      '#description' => t("One per line; wildcards are OK; for instance use /node/preview/* to disable for preview pages"),
      '#default_value' => $admin_configurations->get('hide_for_pages'),
    ];
    $form['hide_assignee_options'] = [
      '#type' => 'checkbox',
      '#title' => t('Hide assignee options'),
      '#description' => t("Disable and hide assignee dropdown (assignee still set in endpoint config)"),
      '#default_value' => $admin_configurations->get('hide_assignee_options'),
    ];
    $form['hide_reporter_options'] = [
      '#type' => 'checkbox',
      '#title' => t('Hide reporter options'),
      '#description' => t("Disable reporter dropdown; reporter field is text box"),
      '#default_value' => $admin_configurations->get('hide_reporter_options'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config_values = $form_state->getValues();
    $config_fields = [
      'frontback_repo_id',
      'frontback_endpoint',
      'hide_button',
      'hide_assignee_options',
      'hide_reporter_options',
      'show_on_admin_routes',
      'show_on_nonadmin_routes',
      'hide_for_pages',
    ];
    $config = $this->config('frontback.admin_settings');
    foreach ($config_fields as $config_field) {
      $config->set($config_field, $config_values[$config_field])
        ->save();
    }
    parent::submitForm($form, $form_state);
  }

}
