<?php
//����ҳ��������html�����ʽ��utf-8
header("Content-Type: text/plain;charset=gb2312"); 
//header("Content-Type: application/json;charset=utf-8"); 
//header("Content-Type: text/xml;charset=utf-8"); 
//header("Content-Type: text/html;charset=utf-8"); 
//header("Content-Type: application/javascript;charset=utf-8"); 

//����һ����ά���飬����Ա������Ϣ��ÿ��Ա����ϢΪһ������
$staff = array
	(
		array("name" => "����", "number" => "101", "sex" => "��", "job" => "�ܾ���"),
		array("name" => "����", "number" => "102", "sex" => "��", "job" => "��������ʦ"),
		array("name" => "����", "number" => "103", "sex" => "Ů", "job" => "��Ʒ����")
	);

//�ж������get��������������������POST����������½�
//$_SERVER��һ����ȫ�ֱ�������һ���ű���ȫ���������ж����ã�����ʹ��global�ؼ���
//$_SERVER["REQUEST_METHOD"]���ط���ҳ��ʹ�õ����󷽷�
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	search();
} elseif ($_SERVER["REQUEST_METHOD"] == "POST"){
	create();
}

//ͨ��Ա���������Ա��
function search(){
	//����Ƿ���Ա����ŵĲ���
	//isset�������Ƿ����ã�empty�ж�ֵΪ��Ϊ��
	//��ȫ�ֱ��� $_GET �� $_POST �����ռ�������
	if (!isset($_GET["number"]) || empty($_GET["number"])) {
		echo "��������";
		return;
	}
	//����֮�������ı���ӵ�� Global ������ֻ���ں���������з��ʡ�
	//global �ؼ������ڷ��ʺ����ڵ�ȫ�ֱ���
	global $staff;
	//��ȡnumber����
	$number = $_GET["number"];
	$result = "û���ҵ�Ա����";
	
	//����$staff��ά���飬����keyֵΪnumber��Ա���Ƿ���ڣ�������ڣ����޸ķ��ؽ��
	foreach ($staff as $value) {
		if ($value["number"] == $number) {
			$result = "�ҵ�Ա����Ա����ţ�" . $value["number"] . "��Ա��������" . $value["name"] . 
			                  "��Ա���Ա�" . $value["sex"] . "��Ա��ְλ��" . $value["job"];
			break;
		}
	}
    echo $result;
}

//����Ա��
function create(){
	//�ж���Ϣ�Ƿ���д��ȫ
	if (!isset($_POST["name"]) || empty($_POST["name"])
		|| !isset($_POST["number"]) || empty($_POST["number"])
		|| !isset($_POST["sex"]) || empty($_POST["sex"])
		|| !isset($_POST["job"]) || empty($_POST["job"])) {
		echo "Ա����Ϣ��д��ȫ";
		return;
	}
	//TODO: ��ȡPOST�����ݲ����浽���ݿ�
	
	//��ʾ����ɹ�
	echo "Ա����" . $_POST["name"] . " ��Ϣ����ɹ���";
}
?>
