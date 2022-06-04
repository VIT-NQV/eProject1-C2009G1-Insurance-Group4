<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "Project");

function db_connect() {
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    return $connection;
}

$db = db_connect();


function db_disconnect($connection) {
    if(isset($connection)) {
      mysqli_close($connection);
    }
}

function confirm_query_result($result){
    global $db;
    if (!$result){
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    } else {
        return $result;
    }
}

function tel($tel) {
    $result = preg_match( '/^(09|03|07|08|05)+([0-9]{8})$/', $tel );
    return $result;
}

function insert_company($CongTyBaoHiem) {
    global $db;

    $sql = "INSERT INTO CongTyBaoHiem ";
    $sql .= "(TenCongTy, SoDienThoai, QuocGia, DiaChi) ";
    $sql .= "VALUES (";
    $sql .= "'" . $CongTyBaoHiem['TenCongTy'] . "',";
    $sql .= "'" . $CongTyBaoHiem['SoDienThoai'] . "',";
    $sql .= "'" . $CongTyBaoHiem['QuocGia'] . "',";
	$sql .= "'" . $CongTyBaoHiem['DiaChi'] . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
	return confirm_query_result($result);
}

function find_all_CongTyBaoHiem(){
    global $db;

    $sql = "SELECT * FROM CongTyBaoHiem ";
    $sql .= "ORDER BY IDTenCongTy";
    $result = mysqli_query($db, $sql); 
    return $result; 
}

function find_company_by_id($id) {
    global $db;

    $sql = "SELECT * FROM CongTyBaoHiem ";
    $sql .= "WHERE IDTenCongTy='" . $id . "'";
    $result = mysqli_query($db, $sql);
    confirm_query_result($result);
    $CongTyBaoHiem = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $CongTyBaoHiem;
}

function update_company($CongTyBaoHiem) {
    global $db;

    $sql = "UPDATE CongTyBaoHiem SET ";
    $sql .= "TenCongTy='" . $CongTyBaoHiem['TenCongTy'] . "', ";
	$sql .= "SoDienThoai='" . $CongTyBaoHiem['SoDienThoai'] . "', ";
    $sql .= "QuocGia='" . $CongTyBaoHiem['QuocGia'] . "' ,";
	$sql .= "DiaChi='" . $CongTyBaoHiem['DiaChi'] . "' ";
    $sql .= "WHERE IDTenCongTy='" . $CongTyBaoHiem['IDTenCongTy'] . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);

}

function delete_company($id) {
    global $db;

    $sql = "DELETE FROM CongTyBaoHiem ";
    $sql .= "WHERE IDTenCongTy='" . $id . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}
//
function insert_danhmuc($danhmuc){
    global $db;

    $sql = "INSERT INTO DanhMuc ";
    $sql .= "(TenDanhMuc) ";
    $sql .= "VALUES (";
    $sql .= "'" . $danhmuc['tendanhmuc'] . "'";
    $sql .= ")";

    $result = mysqli_query($db, $sql);
    if($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function fin_all_danhmuc(){
    global $db;
    $sql = "SELECT * FROM DanhMuc ";
    $sql .= "ORDER BY IDDanhMuc";
    $result = mysqli_query($db, $sql);
    return $result;
}

function find_danhmuc_by_id($id){
    global $db;
    $sql = "SELECT * FROM DanhMuc ";
    $sql .= "WHERE IDDanhMuc='" . $id . "'";

    $result = mysqli_query($db,$sql);
    confirm_query_result($result);

    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject;
}

function update_danhmuc($danhmuc) {
    global $db;

    $sql = "UPDATE DanhMuc SET ";
    $sql .= "TenDanhMuc='" . $danhmuc['TenDanhMuc'] . "' ";
    $sql .= "WHERE IDDanhMuc='" . $danhmuc['IDDanhMuc'] . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function delete_danhmuc($id) {
    global $db;
    $sql = "DELETE FROM DanhMuc ";
    $sql .= "WHERE IDDanhMuc='" . $id . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db,$sql);
    return confirm_query_result($result);
}
//
function insert_gbh($gbh){
    global $db;

    $sql = "INSERT INTO GoiBaoHiem ";
    $sql .= "(IDTenCongTy, IDDanhMuc, TenGoiBaoHiem, PhamViBaoHiem, QuyenLoi, HanSuDung, Gia, MucTrachNhiem, MucBoiThuong, CacTruongHopKhongDuocBoiThuong) ";
    $sql .= "VALUES ("; 
    $sql .= "'" . $gbh['IDTenCongTy'] . "',";
    $sql .= "'" . $gbh['IDDanhMuc'] . "',";
    $sql .= "'" . $gbh['TenGoiBaoHiem'] . "',";
    $sql .= "'" . $gbh['PhamViBaoHiem'] . "',";
    $sql .= "'" . $gbh['QuyenLoi'] . "',";
    $sql .= "'" . $gbh['HanSuDung'] . "',";
    $sql .= "'" . $gbh['Gia'] . "',";
    $sql .= "'" . $gbh['MucTrachNhiem'] . "',";
    $sql .= "'" . $gbh['MucBoiThuong'] . "',";
    $sql .= "'" . $gbh['CacTruongHopKhongDuocBoiThuong'] . "'";
    $sql .= ")";

    $result = mysqli_query($db, $sql);
    if($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function fin_all_gbh(){
    global $db;
    $sql = "SELECT * FROM GoiBaoHiem ";
    $sql .= "ORDER BY IDGoiBaoHiem";
    $result = mysqli_query($db, $sql);
    return $result;
}

function find_gbh_by_id($id){
    global $db;
    $sql = "SELECT * FROM GoiBaoHiem ";
    $sql .= "WHERE IDGoiBaoHiem='" . $id . "'";

    $result = mysqli_query($db,$sql);
    confirm_query_result($result);

    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject;
}

function check_login($username,$password){
    global $db;
  
    $sql = "SELECT TaiKhoan,MatKhau  FROM `Admin` ";
    $sql .= "WHERE TaiKhoan='" . $username . "'";
    
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result)){
        $log = mysqli_fetch_assoc($result);
        if($log['TaiKhoan'] == $username && $log['MatKhau'] == $password){
            return true;
        }else
            return false;
    }else
        return false;
        
}

function update_gbh($gbh) {
    global $db;

    $sql = "UPDATE GoiBaoHiem SET ";
    $sql .= "IDTenCongTy='" . $gbh['IDTenCongTy'] . "', ";
    $sql .= "IDDanhMuc='" . $gbh['IDDanhMuc'] . "', ";
    $sql .= "TenGoiBaoHiem='" . $gbh['TenGoiBaoHiem'] . "', ";
    $sql .= "PhamViBaoHiem='" . $gbh['PhamViBaoHiem'] . "', ";
    $sql .= "QuyenLoi='" . $gbh['QuyenLoi'] . "', ";
    $sql .= "HanSuDung='" . $gbh['HanSuDung'] . "', ";
    $sql .= "Gia='" . $gbh['Gia'] . "', ";
    $sql .= "MucTrachNhiem='" . $gbh['MucTrachNhiem'] . "', ";
    $sql .= "MucBoiThuong='" . $gbh['MucBoiThuong'] . "', ";
    $sql .= "CacTruongHopKhongDuocBoiThuong='" . $gbh['CacTruongHopKhongDuocBoiThuong'] . "' ";
    $sql .= "WHERE IDGoiBaoHiem='" . $gbh['IDGoiBaoHiem'] . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function delete_gbh($id) {
    global $db;
    $sql = "DELETE FROM GoiBaoHiem ";
    $sql .= "WHERE IDGoiBaoHiem='" . $id . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db,$sql);
    return confirm_query_result($result);
}

function find_all_gbh_full(){
    global $db;
    $sql = "SELECT g.IDGoiBaoHiem, c.TenCongTy, d.TenDanhMuc, g.TenGoiBaoHiem, g.PhamViBaoHiem, g.QuyenLoi, g.HanSuDung, g.Gia, g.MucTrachNhiem, g.MucBoiThuong, g.CacTruongHopKhongDuocBoiThuong ";
    $sql .="FROM goibaohiem AS g ";
    $sql .="LEFT JOIN congtybaohiem AS c ON g.IDTenCongTy = c.IDTenCongTy ";
    $sql .="LEFT JOIN danhmuc AS d ON g.IDDanhMuc = d.IDDanhMuc ";
    $sql .= "ORDER BY IDGoiBaoHiem";
    $result = mysqli_query($db, $sql);
    return $result;

}

function find_gbh_by_id_full($id){
    global $db;
    $sql = "SELECT g.IDGoiBaoHiem, c.TenCongTy, d.TenDanhMuc, g.TenGoiBaoHiem, g.PhamViBaoHiem, g.QuyenLoi, g.HanSuDung, g.Gia, g.MucTrachNhiem, g.MucBoiThuong, g.CacTruongHopKhongDuocBoiThuong ";
    $sql .="FROM goibaohiem AS g ";
    $sql .="LEFT JOIN congtybaohiem AS c ON g.IDTenCongTy = c.IDTenCongTy ";
    $sql .="LEFT JOIN danhmuc AS d ON g.IDDanhMuc = d.IDDanhMuc ";
    $sql .= "WHERE IDGoiBaoHiem='" . $id . "'";

    $result = mysqli_query($db,$sql);
    confirm_query_result($result);

    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject;
}

function find_gbh_like($search){
    global $db;
    $sql = "SELECT TenGoiBaoHiem ";
    $sql .="FROM goibaohiem ";
    $sql .= "WHERE TenGoiBaoHiem LIKE '%" . $search . "%';";
    $result = mysqli_query($db, $sql);
    $s = mysqli_fetch_assoc($result);
    
    if ($s != ''){
        print_r($s);
        foreach ($s as $value){
            echo $value;
        }
    } else {
        echo 'khong tim thay';
    }
}


?>