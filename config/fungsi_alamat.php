 <?php
 function showOptionProvinceKTPByCountry(){
            echo "<select  name=\"province_id_ktp\" id=\"province_id_ktp\">";
            echo "            <option value=\"0\">None</option>";            
            $country = isset($_REQUEST['country_iso']) ? $_REQUEST['country_iso'] : "ID";
            $sql = "select * from sk_province where country_iso = '" . $country . "' ";
            $sk_province_list = $this->createList($sql);
            foreach($sk_province_list as $sk_province){
                echo "<option value='". $sk_province->getId() . "'>" . $sk_province->getName() . "</option>";
            }            
            echo "</select>";
        }

function showOptionProvinceKostByCountry(){
            echo "<select  name=\"province_id_kost\" id=\"province_id_kost\">";
            echo "            <option value=\"0\">None</option>";            
            $country = isset($_REQUEST['country_iso']) ? $_REQUEST['country_iso'] : "ID";
            $sql = "select * from sk_province where country_iso = '" . $country . "' ";
            $sk_province_list = $this->createList($sql);
            foreach($sk_province_list as $sk_province){
                echo "<option value='". $sk_province->getId() . "'>" . $sk_province->getName() . "</option>";
            }            
            echo "</select>";
        }

function showOptionCityKTPByProvince(){
    echo "<select  name=\"city_id_ktp\" id=\"city_id_ktp\">";
    echo "    <option value=\"0\">None</option>";
    
    $province_id = isset($_REQUEST['province_id']) ? $_REQUEST['province_id'] : "0";
    $sql = "select * from sk_city where province_id = '" . $province_id . "' ";
    $sk_city_list = $this->createList($sql);            
    foreach($sk_city_list as $sk_city){
        echo "<option value=\"".$sk_city->getId() ."\">".$sk_city->getName(). "</option>";
    }
    echo "</select>";
}

function showOptionCityKostByProvince(){
    echo "<select  name=\"city_id_kost\" id=\"city_id_kost\">";
    echo "    <option value=\"0\">None</option>";
    
    $province_id = isset($_REQUEST['province_id']) ? $_REQUEST['province_id'] : "0";
    $sql = "select * from sk_city where province_id = '" . $province_id . "' ";
    $sk_city_list = $this->createList($sql);            
    foreach($sk_city_list as $sk_city){
        echo "<option value=\"".$sk_city->getId() ."\">".$sk_city->getName(). "</option>";
    }
    echo "</select>";
}

?>