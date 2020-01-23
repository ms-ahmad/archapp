//بداية  دالة إضافة الغياب
function absence_Add_Ajax() {
    var Absence = document.getElementById("Absence").value;
    var xhr = new XMLHttpRequest();
    if (Absence > 31) {
        moreDayOfMount();
    } else {

        var perId = document.getElementById("perId").value;
        if (Absence === null || Absence === "") {
            alert("يجب ادخال عدد في حقل عدد ايام الغياب")
        } else {



            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("showAddAbsence").innerHTML = xhr.responseText;
                    clearInput();
                }

            }
            xhr.open("post", "InsertAbsence.php", true);
            xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            xhr.send("&Absence=" + Absence + "&perId=" + perId);
        }
    }
}

//نهاية  دالة إضافة الغياب

//بداية  دالة إضافة إجازات
function Vacation_Add_Ajax() {

    var xhr = new XMLHttpRequest();
    var VacationType = document.getElementById("VacationType").value;
    var VacationNumber = document.getElementById("VacationNumber").value;
    var perId = document.getElementById("perId").value;

    // alert (inclValu);

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("show").innerHTML = xhr.responseText;
            clearInput();
        }

    }
    xhr.open("post", "Insert.php", true);
    xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    xhr.send("&VacationType=" + VacationType  + "&VacationNumber=" + VacationNumber + "&perId=" + perId);
        }
    


//نهاية  دالة إضافة إجازات







//بداية  دالة إضافة ايفاد
function Dispatch_Add_Ajax() {
    var Dispatch = document.getElementById("Dispatch").value;
    if (Dispatch > 31) {
        moreDayOfMount();
    } else {
        var xhr = new XMLHttpRequest();

        var perId = document.getElementById("perId").value;
        if (Dispatch === null || Dispatch === "") {
            alert("يجب ادخال عدد في حقل عدد ايام الغياب")
        } else {



            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("show").innerHTML = xhr.responseText;
                    clearInput();
                }

            }
            xhr.open("post", "Insert.php", true);
            xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            xhr.send("&Dispatch=" + Dispatch + "&perId=" + perId);
        }
    }
}

//نهاية  دالة إضافة ايفاد

//بداية  دالة إضافة التضمين
function inclusion_Add_Ajax() {
    var xhr = new XMLHttpRequest();

    var inclName = document.getElementById("inclName").value;
    var inclValu = document.getElementById("inclValu").value;
    var perId = document.getElementById("perId").value;

    // alert (inclValu);

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("show").innerHTML = xhr.responseText;
            clearInput();
        }

    }
    xhr.open("post", "Insert.php", true);
    xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    xhr.send("&inclValu=" + inclValu  + "&inclName=" + inclName + "&perId=" + perId);
}


//نهاية  دالة إضافة التضمين
//بداية  دالة إضافة التنفيذ
function Implementation_Add_Ajax() {
    var xhr = new XMLHttpRequest();

    var ImpleName = document.getElementById("ImpleName").value;
    var ImpleValue = document.getElementById("ImpleValue").value;
    var perId = document.getElementById("perId").value;

    // alert (inclValu);

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("show").innerHTML = xhr.responseText;
            clearInput();
        }

    }
    xhr.open("post", "Insert.php", true);
    xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    xhr.send("&ImpleName=" + ImpleName  + "&ImpleValue=" + ImpleValue + "&perId=" + perId);
}


//نهاية  دالة إضافة التنفيذ




//بداية  دالة إضافة الامانة
function troustValue_Add_Ajax() {
    var xhr = new XMLHttpRequest();

    var troustName = document.getElementById("troustName").value;
    var troustValue = document.getElementById("troustValue").value;
    var perId = document.getElementById("perId").value;

    // alert (inclValu);

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("show").innerHTML = xhr.responseText;
            clearInput();
        }

    }
    xhr.open("post", "Insert.php", true);
    xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    xhr.send("&troustName=" + troustName  + "&troustValue=" + troustValue + "&perId=" + perId);
}


//نهاية  دالة إضافة الامانة
/// بداية دالة تفريغ الحقول
function clearInput() {
    $("input.text1").val("");
    $("select").val("");
}

/// نهاية  دالة تفريغ الحقول

function moreDayOfMount() {
    alert("العدد المدخل اكبر من عدد أيام الشهر الواحد");
}