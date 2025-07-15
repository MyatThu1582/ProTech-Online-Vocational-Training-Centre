<link rel="stylesheet" href="../font.css">
<link rel="stylesheet" href="../boostrap/css/bootstrap.min.css">
<script src="../boostrap/js/bootstrap.bundle.js"></script>
<style media="screen">
  body{
    font-family: "Titillium Web", sans-serif;
    font-weight: 600;
    font-style: normal;
  }
  .navbar{
    transition: 0.5s;
    background-color: white;
    /* background-image: url('../images/for_navbar.jpg');
    background-size: cover;
    background-repeat: no-repeat; */
  }
  .navbar2{
    background: rgb(255,255,255);
    /* background: linear-gradient(82deg, rgba(0,0,0,0.1) 0%, rgba(255,255,255,1) 100%); */
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 255, 0.2);
    /* margin-top: -72px; */
    margin-top: -144px;
  }
  ul li .menu{
    position: relative;
  }
  ul li .menu:hover{
    color: rgba(0,0,0,0.8) !important;
  }
  ul li .menu:before{
    content: '';
    width: 0px;
    height: 2px;
    border-radius: 10px;
    background-color: blue;
    position: absolute;
    left: 5;
    top: 90%;
    transition: 0.8s;
    margin-left: 40%;
  }
  ul li:hover .menu:before{
    width: 90%;
    margin: 0;
    /* display: none; */
  }

  ul li:hover .menu{
    color: white;
  }

  ul li .menu2{
    position: relative;
  }
  ul li .menu2:before{
    content: '';
    width: 0px;
    height: 2px;
    background-color: blue;
    position: absolute;
    left: 5;
    top: 90%;
    transition: 0.8s;
    margin-left: 40%;
  }
  ul li:hover .menu2:before{
    width: 90%;
    margin: 0;
    /* display: none; */
  }
  .register-div{
    background-image: url("images/register (2).jpg");
    background-size: cover;
    background-repeat: no-repeat;
  }
  /* .course{
    border-radius: 5px;
  border:1px solid grey;
    padding:10px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 255, 0.5);
  } */
  /* .course_content{
    padding-top:15px;
    padding-right:15px;
    padding-left:15px;
    padding-bottom:5px;
  } */
  .chapterdiv{
      cursor: pointer;
  }
  .chapterdiv:hover{
    background-color: rgba(0, 0, 255, 0.2);
  }
  a{
    text-decoration: none;
    color: black;
  }
  /* .subject_btn{
    width:150px;
    position: relative;
    padding:6px 0px;
    margin:3px 0px;
    font-size: 20px;
    border: none;
    background-color: rgba(0,0,0,0.09);
    transition: 0.4s;
    border-radius: 2px;
    font-size: 18px;
  }
  .subject_btn:hover{
    color: white;
    background-color: rgba(0,0,255,0.8);
  } */
   .subject_btn {
    background: #f1f5f9;
    color: #1e293b;
    border: 1px solid #cbd5e1;
    padding: 10px 20px;
    margin: 5px;
    font-weight: 600;
    transition: all 0.3s ease;
  }

  .subject_btn:hover,
  .subject_btn.active {
    background: #2563eb;
    color: #fff;
    border-color: #2563eb;
  }
  .course-search-input {
  padding: 10px 38px 10px 14px;
  border: 1px solid #ccc;
  border-radius: 8px;
  box-shadow: none;
  font-size: 14px;
  transition: all 0.3s ease;
}

.course-search-input:focus {
  outline: none;
  border-color: #007bff;
  box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.1);
}

.search-icon-btn {
  position: absolute;
  top: 50%;
  right: 10px;
  transform: translateY(-50%);
  background: transparent;
  border: none;
  padding: 0;
  color: #666;
  cursor: pointer;
  transition: all 0.3s ease;
}

.search-icon-btn:hover svg {
  stroke: #007bff;
  transform: scale(1.1);
}

  .search_course{
    width: 230px;
    padding: 6px 10px;
    outline: none;
    border: none;
    background-color: transparent;
  }
  /* .morecoursebtn{
    width: 170px;
  } */

  /* .morecoursebtn span {
    cursor: pointer;
    display: inline-block;
    position: relative;
    transition: 0.5s;
  }

  .morecoursebtn span:after {
    content: '\00bb';
    position: absolute;
    opacity: 0;
    top: 0;
    left: 0px;
    transition: 0.5s;
  }

  .morecoursebtn:hover span {
    padding-left: 20px;
  }

  .morecoursebtn:hover span:after {
    opacity: 1;
    left: 0;
  } */

/* ====== COURSE CARD STYLE ====== */
.course {
  background: #fff;
  border-radius: 15px;
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
  overflow: hidden;
  transition: transform 0.4s ease, box-shadow 0.4s ease;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.course:hover {
  transform: translateY(-6px);
  box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
}

/* ====== COURSE IMAGE ====== */
.courseimg {
  width: 100%;
  height: 300px;
  object-fit: cover;
  border-top-left-radius: 18px;
  border-top-right-radius: 18px;
  overflow: hidden;
}
/* .courseimg img {
  transition: 0.5s;
}
.courseimg img:hover {
  scale: 1.05;
} */
/* ====== COURSE CONTENT ====== */
.course_content {
  padding: 0px 20px;
}

.course_content h4 {
  font-weight: 600;
  font-size: 20px;
  color: #222;
}

.course_content span {
  display: block;
  font-size: 14px;
  color: #999;
  margin-bottom: 8px;
}

.course_content p {
  font-size: 15px;
  color: #444;
}

/* ====== FOOTER ====== */
.course .row.mb-3 {
  padding: 0 10px 10px;
  align-items: center;
}

.see-more-btn-rect {
  display: inline-block;
  background-color:hsl(200, 95.90%, 47.50%); /* deep black navy */
  color: #ffffff;
  padding: 10px 30px;
  font-weight: 600;
  font-size: 16px;
  letter-spacing: 0.5px;
  text-transform: uppercase;
  border: 2px solid transparent;
  text-decoration: none;
  transition: all 0.3s ease;
  box-shadow: 0 5px 10px rgba(0,0,0,0.1);
  margin-bottom: 65px;
}

.see-more-btn-rect:hover {
  background-color: #ffffff;
  color: #111827;
  border-color: #111827;
  transform: translateY(-2px);
}

.price {
  font-size: 16px;
  font-weight: 600;
  color: #28a745;
}

.btn-primary,
.btn-success {
  border-radius: 30px;
  padding: 6px 18px;
  font-size: 14px;
}

/* Section Title */
.course_introleft h3 {
  font-size: 28px;
  /* font-weight: bold; */
  margin-bottom: 16px;
}

/* "See More Course" Button */
.morecoursebtn {
  padding: 6px 22px;
  border-radius: 25px;
  font-weight: 500;
}

  
.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
  transition: 0.5s;
  cursor: pointer;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 10px 14px;
  text-decoration: none;
  display: block;
  transition: 0.5s;
}

.dropdown-content a:hover {
  background: #044bb5;
  color: white;
}

.dropdown:hover .dropdown-content {display: block;}

.conlan{
  padding: 8px 10px;
}
.landropdown {
  position: relative;
  display: inline-block;
  transition: 0.5s;
  cursor: pointer;
}
.landropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 60px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  color: black;
  height: 98px;
}

.conlan:hover{
  background: #044bb5;
}
.conlan:hover .lan{
  color: white;
}

.landropdown:hover .landropdown-content {display: block;}

#container {
  width: 35px;
  height: 35px;
  border-radius: 100px;
  background: #05347a;
  margin-top: 3px;
}
#name {
  width: 100%;
  text-align: center;
  color: white;
  font-size: 17px;
  line-height: 5px;
}
#name2 {
  width: 100%;
  text-align: center;
  color: white;
  font-size: 17px;
  line-height: 5px;
}

#container_profile {
  width: 150px;
  height: 150px;
  border-radius: 20px;
  background: rgb(34,37,195);
  background: linear-gradient(131deg, rgba(34,37,195,1) 26%, rgba(253,45,45,1) 71%);
  /* background: #05347a; */
  margin-top: 3px;
  margin-left: 145px;
}
#container_profile_with_img {
  width: 150px;
  height: 150px;
  border-radius: 20px;
  background: rgb(34,37,195);
  margin-top: 3px;
  margin-left: 145px;
}
#name_profile {
  width: 100%;
  text-align: center;
  color: white;
  font-size: 80px;
  line-height: 150px;
  transition: 0.5s;
}
.editLinks{
  display: block;
  border: none;
  outline: none;
  background-color: transparent;
  /* margin: 12px; */
  transition: 0.7s;
}
.editLinks:hover{
  padding-left: 17px;
}
.inpv2{
  border: 1px solid grey;
  margin-top: 6px;
}
.formcontainer {
    width: 80%;
    max-width: 600px;
    margin: 2rem auto;
    padding: 2rem;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}
.editprofile{
  cursor: pointer;
  overflow: hidden;
}
.camera{
  color: white;
  z-index: 2;
  text-align: center;
  border-bottom-left-radius: 16px;
  border-bottom-right-radius: 16px;
  background-color: rgba(0, 0, 0, 0.5);
  padding: 8px;
  opacity:0;
  /* margin-top: -151px; */
  margin-top: -36px;
  transition: 0.5s;
}
.camera_with_img{
  color: white;
  z-index: 2;
  text-align: center;
  border-bottom-left-radius: 16px;
  border-bottom-right-radius: 16px;
  background-color: rgba(0, 0, 0, 0.5);
  padding: 8px;
  opacity:0;
  margin-top: 105px;
  transition: 0.5s;
}
.camera-icon{
  margin-top:-30px;
  cursor: context-menu;
}
.editprofile:hover .camera{
  /* display: block; */
  opacity: 1;
}
.editprofile:hover .camera_with_img{
  /* display: block; */
  opacity: 1;
}
.editprofile:hover #name_profile{
  /* color : rgba(0,0,0,0.5); */
  margin-top:-10px;
}
.submitbtn{
  border: none;
}
.feedback{
    border:1px solid lightblue;
}
.hide{
  opacity: 0;
}
.uptodown{
  margin-top: -88px;
}
.none{
  display: none;
}
/* ================================
   FLOAT-UP ANIMATION (clean + smooth)
================================= */
.float-up {
  opacity: 0;
  transform: translateY(50px);
  transition: opacity 0.8s ease-out, transform 0.8s ease-out;
}

/* When visible in viewport */
.float-up.show {
  opacity: 1;
  transform: translateY(0);
}
.hide-scrollbar {
  scrollbar-width: none; /* Firefox */
}
.hide-scrollbar::-webkit-scrollbar {
  display: none; /* Chrome, Safari, Opera */
}
.glass-arrow {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  backdrop-filter: blur(10px);
  background: rgba(255, 255, 255, 0.15);
  border: 1px solid rgba(255, 255, 255, 0.2);
  box-shadow: 0 8px 16px rgba(0,0,0,0.1);
  border-radius: 12px;
  padding: 6px 10px;
  color:hsl(200, 95.90%, 47.50%); /* deep black navy */

  transition: all 0.3s ease;
  z-index: 20;
  cursor: pointer;
}

.glass-arrow svg {
  display: block;
  transition: transform 0.3s ease;
}

.glass-arrow:hover {
  background: rgba(0, 123, 255, 0.15);
  color: #fff;
  transform: translateY(-50%) scale(1.05);
}

.glass-arrow:hover svg {
  transform: translateX(2px);
  stroke: #fff;
}

.left-arrow {
  left: -10px;
}

.right-arrow {
  right: -10px;
}

.client-tile {
    position: relative;
    height: 250px;
    background-size: cover;
    background-position: center;
    border-radius: 10px;
    overflow: hidden;
    transition: transform 0.3s ease;
    box-shadow: 0 8px 24px rgba(0,0,0,0.2);
  }

  .client-tile:hover {
    transform: scale(1.03);
  }

  .client-tile .overlay {
    background: rgba(0, 0, 0, 0.55);
    color: white;
    height: 100%;
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    opacity: 0;
    transition: 0.4s ease;
  }

  .client-tile:hover .overlay {
    opacity: 1;
  }

  .overlay .content h5 {
    font-size: 1.25rem;
    font-weight: 600;
  }

  .overlay .content small {
    display: block;
    margin-top: 5px;
    font-size: 0.9rem;
    color: #ddd;
  }

  .client-link-btn {
    color: white;
    text-decoration: none;
    font-weight: 500;
  }
  .client-card {
    height: 260px;
    position: relative;
    border-radius: 12px;
  }

  .client-img {
    height: 100%;
    object-fit: contain;
    background: #f8f9fa;
    transition: transform 0.4s ease;
  }

  .client-card:hover .client-img {
    transform: scale(1.03);
  }

  .client-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.55);
    opacity: 0;
    transition: 0.3s ease-in-out;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .client-card:hover .client-overlay {
    opacity: 1;
  }

  .client-overlay h5 {
    font-weight: 600;
    font-size: 1.2rem;
  }

  .client-overlay small {
    font-size: 0.85rem;
    color: #ddd;
  }
@media(max-width:1000px){
  .tohide{
    display: none;
  }
  .toshow{
    display: block;
  }
  .full{
    width: 100%;
  }
  .mlrb{
    padding: 30px;
  }
  .mb-no{
    margin-bottom: 0px !important;
  }
  .nomargin{
    margin: 0px !important;
  }
  .landropdown-content {
    left: -48px;
  }

  .dropdown-content {
    left: -120px;
    top: 38.5px;
  }
  .bannar{
    height: 45% !important;
  }
  .testhover{
    font-size: 22px !important;
    padding-top:45% !important;
  }
  .course_intro{
      margin-top: 0px !important;
  }
  .course_introleft{
    margin: 0px !important;
    padding: 20px !important;
  }
  .courseimg{
    width: 100% !important;
    height:35% !important;
  }
  .price{
    width:50% !important;
  }
  .courseDetail{
    padding-left: 60px !important;
  }
  .features{
    margin: 60px;
  }
  .courseDetailimg{
    height:200px !important;
  }
  .feedback{
    height: 40%;
  }
  .feedbackdiv{
    padding: 50px;
  }
  .searchandcategories{
    padding:20px !important;
  }
  .search_course{
    width:87% !important;
  }
  .searchdiv{
    padding-top: 50px;
    padding-right: 20px;
    padding-left: 20px;
  }
  .searchbtn{
    margin: 0px !important;
  }
  .subject_btn{
    width:100px;
    position: relative;
    padding:6px 0px;
    font-size: 15px !important;
    border: none;
    background-color: rgba(0,0,0,0.09);
    transition: 0.4s;
    border-radius: 2px;
  }
  .coursediv{
    padding: 30px !important;
  }
  .originalfooter{
    display: none !important;
  }
  .resfooter{
    height: 800px !important;
    display: block !important;
  }
  .footerdiv{
    margin: 0px !important;
    padding: 20px !important;
    width: 100%;
  }
  .footerotherdiv{
    text-align: center;
    margin-top: 20px !important;
    margin-bottom: 20px !important;
    padding: 0px !important;
  }
  .logo_div{
    padding-bottom: 100px;
    padding-top: 10px;
    margin: 0px auto !important;
  }
}
</style>
