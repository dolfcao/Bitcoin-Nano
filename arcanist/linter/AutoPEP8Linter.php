<?php

/**
 * Uses the autopep8 tool to format python code
 */
final class AutoPEP8FormatLinter extends ArcanistExternalLinter {

  public function getInfoName() {
    return 'autopep8';
  }

  public function getInfoURI() {
    return '';
  }

  public function getInfoDescription() {
    return pht('Use autopep8 for processing specified files.');
  }

  public function getLinterName() {
    return 'autopep8';
  }

  public function getLinterConfigurationName() {
    return 'autopep8';
  }

  public function getLinterConfigurationOptions() {
    $options = array(
    );

    return $options + parent::getLinterConfigurationOptions();
  }

  public function getDefaultBinary() {
    return 'autopep8';
  }

  public function getInstallInstructions() {
    return pht('Make sure autopep8 is in directory specified by $PATH');
  }

  public function shouldExpectCommandErrors() {
    return false;
  }

  protected function getMandatoryFlags() {
    return array(
    );
  }

  protected function parseLinterOutput($path, $err, $stdout, $stderr) {
    $ok = ($err == 0);

    if (!$ok) {
      return false;
    }

    $root = $this->getProjectRoot();
    $path = Filesystem::resolvePath($path, $root);
    $orig = file_get_contents($path);
    if ($orig == $stdout) {
      return array();
    }

    $message = id(new ArcanistLintMessage())
      ->setPath($path)
      ->setLine(1)
      ->setChar(1)
      ->setGranularity(ArcanistLinter::GRANULARITY_FILE)
      ->setCode('CFMT')
      ->setSeverity(ArcanistLintSeverity::SEVERITY_AUTOFIX)
      ->setName('Code style violation')
      ->setDescription("'$path' has code style errors.")
      ->setOriginalText($orig)
      ->setReplacementText($stdout);
    return array($message);
  }
}
