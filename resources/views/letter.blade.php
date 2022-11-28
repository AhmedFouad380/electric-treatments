<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
	tr, td {
	margin:0px;padding:0px;
	}
    @page {
            margin: 50px 70px 20px 25px !important;
            padding: 0px 0px 0px 0px !important;
            size: 21cm 29.5cm !important;
        }
        
        body, html { 
            size: 21cm 29.5cm !important;
            margin: 50px 70px 20px 25px !important;
            padding: 0px 0px 0px 0px !important;
        }
</style>

<body style="margin:0px;padding:0px;"  onafterprint="window.history.back();" onload="window.print();">
                {!! $data->letter !!}
<?php
    use App\User;
    use App\Job;
    $html = '';
    
if($data->is_assgin != null){
$explode = explode('-',$data->is_assgin);
$html.='<div style="width;48%;display-inline:block">';
foreach($explode as $User){
$dataa = User::find($User);
$job = Job::find($dataa->mainJob_id);
if($dataa != null){
$html .=$job->name;
$html.='<br><br>';
$html.= $dataa->name.' : الاسم' ;
$html.='<br><br>';
$html.= '<img style="width:100px; height:80px;float:right;" src="https://urametsys.com/Upload/UserFiles/'.$dataa->signature_img.'">';
}
}
$html.='</div>';
}
if($data->is_signature != null){
    $html.='<div style="width;48%;display-inline:block">';
$dataa = User::find($data->is_signature);
$html.= '<img style="width:100px; height:80px; float:left" src="https://urametsys.com/Upload/UserFiles/'.$dataa->notation_img.'">';
$html.='</div>';
}

?>
{!! $html !!}
<script>
function ready(){
    
}

    </script>
</body>

</html>
