<?php
	$score = 0;
	// Hàm lấy câu hỏi
	function createQuestion($fileQuestion = 'data/question.txt', $fileOption = 'data/options.txt')
	{
		
		// Lấy câu hỏi
		$data = file($fileQuestion) or die('Cannot read file');
		array_shift($data);
		
		$arrQuestion = array();
		foreach ($data as $key => $value) {
			$tmp                  = explode('|', $value);
			$arrQuestion[$tmp[0]] = array("id" => $tmp[0], "question" => $tmp[1], 'answer' => 'option-' . trim($tmp[2]));
		}
		
		// Lấy câu trả lời cho mỗi câu hỏi
		$data = file($fileOption) or die('Cannot read file');
		
		array_shift($data);
		
		foreach ($data as $key => $value) {
			$tmp                                       = explode('|', $value);
			$arrQuestion[$tmp[0]]['option-' . $tmp[1]] = trim($tmp[2]);
		}
		
		// lấy ngẫu nhiên mỗi câu hỏi
		shuffle($arrQuestion);
		$arrQuestion = array_slice($arrQuestion, 0, 11);
		
		return $arrQuestion;
	}
	
	function showAnswer($idQuestion, $valueRadio, $contentAnswer)
	{
		$xhtml = '<div class="radio">
						<label><input type="radio" name="question-' . $idQuestion . '" value="' . $valueRadio . '" >' . $contentAnswer . '</label>
					</div>';
		return $xhtml;
	}
	
	function redirect($fileName)
	{
		if (file_exists($fileName)) {
			header("Location: $fileName");
			exit();
		}
	}
	
	
	function showAnswerCheck($option, $optionUser, $optionCorrect, $contentAnswer)
	{
		$classLabel  = '';
		$spanContent = '';
		
		if ($option == $optionUser) {
			$classLabel = 'label label-default';
			if ($optionUser == $optionCorrect) {
				$spanContent = '&nbsp;<span class="glyphicon glyphicon-ok"></span>';
				$GLOBALS['score']++;
				if (!isset($_SESSION)) {
					session_start();
					
				}
				$_SESSION['score'] = $GLOBALS['score'];
				
			} else {
				$spanContent = '&nbsp;<span class="glyphicon glyphicon-remove"></span>';
			}
		} else {
			if ($option == $optionCorrect) {
				$classLabel = 'label label-success';
			} else {
				$classLabel = '';
			}
		}
		
		$xhtml = '<div class="radio">
						<label class="' . $classLabel . '"><input type="radio" name="radio" value="option" disabled="disabled">' . $contentAnswer . '</label>
						' . $spanContent . '
					</div>';
		
		return $xhtml;
	}
	
	
	
	
	
	
	
	
	
	

	
	
	
	
	
	
	
	
	
	
	
	