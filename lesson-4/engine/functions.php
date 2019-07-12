<?php


function render($file, $variables = [])
{
	if (!is_file($file)) {
		echo 'Template file "' . $file . '" not found';
		exit();
	}

	if (filesize($file) === 0) {
		echo 'Template file "' . $file . '" is empty';
		exit();
	}


	$templateContent = file_get_contents($file);

	foreach ($variables as $key => $value) {
		$key = '{{' . strtoupper($key) . '}}';

		$templateContent = str_replace($key, $value, $templateContent);
	}

	return $templateContent;
}



function makeGallery($dir){

    $files = scandir($dir);
    //Убираем лишнее
    $readyFiles = array_slice($files, 2);

    //формируем html
    $html = '';

    foreach ($readyFiles as $key => $link){
        $html.= "<div class='col-md-3'>
                    <div class='gallery-images'>
                        <img src='".IMG_DIR.$link."'>
                    </div>
                </div>";
    }

    return $html;

}


