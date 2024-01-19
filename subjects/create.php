<div id="add" class="modal">
    <form class="modal-content animate create_form" action="" method="GET" style="width:70%;background-color:rgb(222, 217, 237);">
     <div class="imgcontainer">
      <span onclick="document.getElementById('add').style.display='none'" class="close" title="Close Modal">&times;</span>
     </div>

     <div class="container">
     <div class="row mb-3">
            <label class="col-sm-6 col-form-label">الاسم</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-6 col-form-label">اســـم المــادة  </label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="subject_name" value="<?php echo $subject_name;?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-6 col-form-label">الـدرجــة</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="degree" value="<?php echo $degree;?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-6 col-form-label">رقــم الهــاتف</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="phone" value="<?php echo $phone;?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-6 col-form-label">التـقـدير</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="appreciation" value="<?php echo $appreciation;?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-6 col-form-label">التــرتــيـب</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="OrderLevel" value="<?php echo $OrderLevel;?>">
            </div>
        </div>

        <div class="row mb-3">
         <div class="offset-sm-1">
            <button type="submit" class="btn btn-primary create_submit " name="send">إضـــافــة</button>
         </div>
        </div>

        <div class="col-sm-3 d-grid">
          <a class="btn btn-danger btns " role="bottun" href="students.php">إلـغــاء</a>
        </div>
      </div>
     </form>
  </div>