<?php
  //ini_set('display_errors', 1);
  //ini_set('display_startup_errors', 1);
  //error_reporting(E_ALL);

  $dir = dirname(__FILE__);
  require_once $dir. '/../lib/PHPRtfLite.php';

  $name = $_POST['name'];
  $sponsors = $_POST['sponsor'];
  $sponsorList = explode(",", $sponsors);
  $contextpara = $_POST['context'];
  $clauses = $_POST['whereas'];
  $bill = $_POST['sections'];

  // register PHPRtfLite class loader
  PHPRtfLite::registerAutoloader();
  $rtf = new PHPRtfLite();

  //formats created start
  $centerAlign = new PHPRtfLite_ParFormat('center');
  $leftAlign = new PHPRtfLite_ParFormat('left');
  $sponsorFormat = new PHPRtfLite_ParFormat();
  $sponsorFormat -> setIndentLeft(1);
  //formats created end

  //font start
  $title = new PHPRtfLite_Font(16, 'Garamond');
  $title -> setBold();
  $sponsorsFont = new PHPRtfLite_Font(14.5, 'Garamond');
  $sponsorsFont -> setBold();
  $body = new PHPRtfLite_Font(14.5, 'Garamond');
  //font end

  $introSect = $rtf->addSection();
  $introSect -> writeText("Title: $name\n", $title, $centerAlign);
  $introSect -> writeText("<strong>Sponsors:</strong>\tRepresentative ". $sponsorList[0], $body, $leftAlign);
  for($i = 1; $i < count($sponsorList); $i++){
    $introSect -> writeText("\tRepresentative ". trim($sponsorList[$i], " "), $body, new PHPRtfLite_ParFormat());
  }

  $contextSect = $rtf->addSection();
  $contextSect -> writeText("\n\n$contextpara\n\n", $body, $leftAlign);

  $whereasClauses = $rtf->addSection();
  foreach(explode("\n", $clauses) as $clause){
    $whereasClauses -> writeText("Whereas:\t". trim($clause, "\n "), $body, $leftAlign);
  }
  
  $sections = $rtf->addSection();
  foreach(explode("\n", $bill) as $currSection){
    $whereasClauses -> writeText(trim($currSection, "\n"), $body, $leftAlign);
  }

  header("Pragma: public");
  $rtf_filename = "$name.rtf";
  header('Content-disposition: attachment; filename='. $rtf_filename);
  header('Content-type: application/rtf');
  header('Content-Transfer-Encoding: binary');
  if (ob_get_contents()) {
    ob_end_clean();
  }
  flush();
  $rtf->save('php://output');
?>
