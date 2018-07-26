<?php

function write_cv() {
	$res = mark_div( cv_main(), 'main' );
	$res .= mark_div( cv_aside(), 'aside' );
	$res .= mark_div( cv_footer(), 'footer' );
	return $res;
}

function cv_main() {
	$res = cv_description();
	$res .= cv_experience();
	$res .= cv_projects();
	$res .= cv_education();
	$res .= cv_interests();
	return $res;
}

function cv_aside() {
	$res = cv_personal_information();
	$res .= cv_skills();
	$res .= cv_languages();
	return $res;
}

function cv_footer() {
	//$res = 'Wyrażam zgodę na przetwarzanie moich danych osobowych dla potrzeb niezbędnych do realizacji procesu rekrutacji<br>(zgodnie z Ustawą z dnia 29.08.1997 roku o Ochronie Danych Osobowych; tekst jednolity: Dz. U. 2016 r. poz. 922).';
	$res = 'I hereby authorize you to process my personal data included in my CV for the needs of the recruitment process.';
	return $res;
}

function cv_description() {
	$res = cv_data('description');
	return $res;
}

function cv_experience() {
	$data = cv_data('experience');
	$res = mark_h('Experience:', 4, false );

	$details = '';
	foreach ($data as $key) {
		$details .= cv_experience_details($key);
	}

	$res .= $details;
	return $res;
}

function cv_projects() {
	$data = cv_data('projects');
	$res = mark_h('Examples of projects:', 4, false );

	$details = '';
	foreach ($data as $key) {
		$details .= cv_projects_details($key);
	}

	$res .= $details;

	return $res;
}

function cv_education() {
	$data = cv_data('education');
	$res = mark_h('Education:', 4, false );

	$details = '';
	foreach ($data as $key) {
		$details .= cv_education_details($key);
	}

	$res .= $details;

	return $res;
}

function cv_interests() {
	$data = cv_data('interests');
	$res = mark_h('Interests:', 4, false );

	$details = '';
	foreach ($data as $key) {
		$details .= cv_interests_details($key).', ';
	}
	$details = mark_p(substr( $details, 0, -2 ), 'interests' );

	$res .= $details;

	return $res;
}

function cv_personal_information() {
	$data = cv_data('personal informations');
	$res = mark_h('Personal information:', 4, false );

	$details = '';
	foreach ($data as $key) {
		$details .= cv_personal_informations_details($key);
	}

	$res .= $details;

	return $res;
}

function cv_skills() {
	$data = cv_data('skills');
	$res = mark_h('Skills:', 4, false );

	$details = '';
	foreach ($data as $key) {
		$details .= cv_skills_details($key);
	}

	$res .= $details;

	return $res;
}

function cv_languages() {
	$data = cv_data('languages');

	$mother_lang = $data['mother'];

	$res = mark_h('Languages:', 4, false ).
		mark_p( "<b>{$mother_lang}</b>", false ).
		mark_p( "mother tongue", 'lang-desc' );

	foreach ($data['other'] as $lang) {
		$res .= mark_p("<b>".$lang['lang']."</b>", false ).
			mark_p( "reading: ".$lang['reading'] , 'lang-desc' ).
			mark_p( "speaking: ".$lang['speaking'] , 'lang-desc' ).
			mark_p( "listening: ".$lang['listening'] , 'lang-desc' );
	}



	return $res;
}


function cv_date( $date ) {
	return $date[0].' - '.$date[1];
}




function cv_projects_details( $detail ) {
	$name = $detail['name'];
	$link = array_key_exists('link', $detail ) ? $detail['link'] : $detail['name'];
	$desc = $detail['desc'];
	$skills = implode(', ', $detail['skil']);

	$inner = 
		mark_a( $name , $link, 'project-title', 1 ).
		mark_p( $desc , 'project-description' ).
		mark_p( $skills , 'project-more');

	return mark_div( $inner , 'project');
}

function cv_education_details( $detail ) {
	$date = cv_date($detail['date']);
	$place = $detail['place'];
	$spec = array_key_exists('spec', $detail ) ? $detail['spec'] : false;

	$inner = 
		mark_p( $date , 'education-date' ).
		mark_p( $place , 'education-name' );
	if( $spec ) $inner .= 
		mark_p( $spec , 'education-more');

	return mark_div( $inner , 'education');
}

function cv_experience_details( $detail ) {
	$date = cv_date($detail['date']);
	$job = $detail['job'];
	$comp = $detail['comp'];
	$desc = $detail['desc'];
	$skil = $detail['skil'];

	$inner = 
		mark_p( $date , 'experience-date' ).
		mark_p( $job , 'experience-name' ).
		mark_p( 'in '.$comp.' - '.$desc , 'experience-subtitle' ).
		mark_p( implode(', ', $skil) , 'experience-more');

	return mark_div( $inner , 'experience');
}

function cv_interests_details( $detail ) {
	if( is_array( $detail ) ) return mark_a( $detail['name'], $detail['link'], false, 1 );
	return $detail;
}

function cv_personal_informations_details( $detail ) {
	$type = $detail['type'];
	$value = $detail['value'];
	$link = array_key_exists('link', $detail ) ? $detail['link'] : false;

	$res = mark_h( $type.':', 5, false );
	if( $link ) $res .= mark_a( $value, $link, false, 1 );
	else $res .= mark_p( $value, false );
	return $res;
}

function cv_skills_details( $detail ) {
	$type = $detail['type'];
	$skills = $detail['skil'];

	$res = mark_h( $type, 5, false );

	$res .= implode( ', ', $skills);

	return $res;
}




function mark_p( $inner, $class_name ) {
	if( $class_name ) $class_name = ' class="'.$class_name.'"';
	else $class_name = '';
	if( !$inner ) $inner = '';
	return "<p{$class_name}>{$inner}</p>";
}

function mark_div( $inner, $class_name ) {
	if( $class_name ) $class_name = ' class="'.$class_name.'"';
	else $class_name = '';
	if( !$inner ) $inner = '';
	return "<div{$class_name}>{$inner}</div>";
}

function mark_span( $inner, $class_name ) {
	if( $class_name ) $class_name = ' class="'.$class_name.'"';
	else $class_name = '';
	if( !$inner ) $inner = '';
	return "<span{$class_name}>{$inner}</span>";
}

function mark_a( $inner, $link, $class_name, $target ) {
	if( $target ) $target = ' target="_blanc"'; else $target = '';
	if( $class_name ) $class_name = ' class="'.$class_name.'"';
	else $class_name = '';
	if( !$inner ) $inner = '';
	if( $link ) $link = ' href="'.$link.'"';
	else $link = ' href="#"';
	return "<a{$class_name}{$link}{$target}>{$inner}</a>";
}

function mark_h( $inner, $number, $class_name ) {
	if( $class_name ) $class_name = ' class="'.$class_name.'"';
	else $class_name = '';
	return "<h{$number}{$class_name}>{$inner}</h{$number}>";
}

?>