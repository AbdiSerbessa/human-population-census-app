function validate() {
  const emailRe =
    /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
  const passwordRe = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
  const idRe = /\d\d\d\d\/\d\d/;
  var imgallowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
  var docallowedExtensions = /(\.pdf|\.doc|\.docx|\.txt)$/i;
  try {
    var name = document.getElementsByName("name")[0].value;
  } catch (error) {
    var name = "h";
  }
  try {
    var id = document.getElementsByName("id")[0].value;
  } catch (error) {
    var id = "1234/11";
  }
  try {
    var birthplace = document.getElementsByName("birthplace")[0].value;
  } catch (error) {
    var birthplace = "h";
  }
  try {
    var pname = document.getElementsByName("pname")[0].value;
  } catch (error) {
    var pname = "h";
  }
  try {
    var gname = document.getElementsByName("gname")[0].value;
  } catch (error) {
    var gname = "h";
  }
  try {
    var house_id = document.getElementsByName("house_id")[0].value;
  } catch (error) {
    var house_id = "123";
  }
  try {
    var kebele = document.getElementsByName("kebele_id")[0].value;
  } catch (error) {
    var kebele = "01";
  }
  try {
    var age = document.getElementsByName("age")[0].value;
  } catch (error) {
    var age = "10";
  }
  try {
    var fname = document.getElementsByName("fname")[0].value;
  } catch (error) {
    var fname = "h";
  }
  try {
    var email = document.getElementsByName("email")[0].value;
  } catch (error) {
    var email = "hello@gmail.com";
  }
  try {
    var phone = document.getElementsByName("phone")[0].value;
  } catch (error) {
    var phone = "07039502751";
  }
  try {
    var pphone = document.getElementsByName("pphone")[0].value;
  } catch (error) {
    var pphone = "07039502751";
  }
  try {
    var image = document.getElementById("image").value;
  } catch (error) {
    var image = "avatar.jpg";
  }
  try {
    var educ = document.getElementsByName("educ_file")[0].value;
  } catch (error) {
    var educ = "file.pdf";
  }
  try {
    var birth = document.getElementsByName("birth_file")[0].value;
  } catch (error) {
    var birth = "file.pdf";
  }
  try {
    var house = document.getElementsByName("house_file")[0].value;
  } catch (error) {
    var house = "file.pdf";
  }
  if (educ == "") {
    educ = "doc.pdf";
  }
  if (birth == "") {
    birth = "doc.pdf";
  }

  if (
    name.search(/^[A-Za-z]+$/) === -1 ||
    fname.search(/^[A-Za-z]+$/) === -1 ||
    gname.search(/^[A-Za-z]+$/) === -1
  ) {
    alert("Name can't contain number");
    return false;
  } else if (id.search(/\d\d\d\d\/\d\d/) === -1) {
    alert("Invalid Id format");
    return false;
  } else if (!email.match(emailRe)) {
    alert("Invalid email");
    return false;
  } else if (!(kebele.length > 0 && kebele.length <= 2)) {
    alert("invalid admin number");
    return false;
  } else if (!(house_id >= 0 && house_id < 999 && house_id.length == 3)) {
    alert(" invalid house number");
    return false;
  } else if (!imgallowedExtensions.exec(image)) {
    alert("invalid photo file type");
    return false;
  } else if (
    !docallowedExtensions.exec(birth) ||
    !docallowedExtensions.exec(educ)
  ) {
    alert("invalid document file type");
    return false;
  } else if (!docallowedExtensions.exec(house)) {
    alert("invalid house document file type");
    return false;
  }
}
