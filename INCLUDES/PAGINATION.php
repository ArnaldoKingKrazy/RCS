<?php


function paginate($reload, $page, $tpages, $adjacents) {
	$prevlabel = "&lsaquo; Anterior";
	$nextlabel = "Siguiente &rsaquo;";
	$out = '<ul class="pagination pagination-large ">';
	
	// previous label

	if($page==1) {
		$out.= "<li class='disabled'><span><a  class='me-1 btn btn-sm btn-dark'>$prevlabel</a></span></li>";
	} else if($page==2) {
		$out.= "<li><span><a  class='me-1 btn btn-sm btn-primary' href='javascript:void(0);' onclick='load(1)'>$prevlabel</a></span></li>";
	}else {
		$out.= "<li><span><a  class=' me-1 btn btn-sm btn-primary' href='javascript:void(0);' onclick='load(".($page-1).")'>$prevlabel</a></span></li>";

	}
	
	// first label
	if($page>($adjacents+1)) {
		$out.= "<li><a  class='me-1 btn btn-sm btn-primary' href='javascript:void(0);' onclick='load(1)'>1</a></li>";
	}
	// interval
	if($page>($adjacents+2)) {
		$out.= "<li><a  class='me-1 btn btn-sm btn-primary'>...</a></li>";
	}

	// pages

	$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
	$pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
	for($i=$pmin; $i<=$pmax; $i++) {
		if($i==$page) {
			$out.= "<li class='active'><a  class='me-1 btn btn-sm btn-dark'>$i</a></li>";
		}else if($i==1) {
			$out.= "<li><a  class='me-1 btn btn-sm btn-primary' href='javascript:void(0);' onclick='load(1)'>$i</a></li>";
		}else {
			$out.= "<li><a  class='me-1 btn btn-sm btn-primary' href='javascript:void(0);' onclick='load(".$i.")'>$i</a></li>";
		}
	}

	// interval

	if($page<($tpages-$adjacents-1)) {
		$out.= "<li><a>...</a></li>";
	}

	// last

	if($page<($tpages-$adjacents)) {
		$out.= "<li><a  class='btn btn-sm btn-primary' href='javascript:void(0);' onclick='load($tpages)'>$tpages</a></li>";
	}

	// next

	if($page<$tpages) {
		$out.= "<li><span><a  class=' apagi btn btn-sm btn-primary' href='javascript:void(0);' onclick='load(".($page+1).")'>$nextlabel</a></span></li>";
	}else {
		$out.= "<li class='disabled'><span><a  class='apagi btn btn-sm btn-dark'>$nextlabel</a></span></li>";
	}
	
	$out.= "</ul>";
	return $out;
}
?>