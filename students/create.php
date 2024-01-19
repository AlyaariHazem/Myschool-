<div id="addstudent" class="modal">
    <form class="modal-content animate create_form" action="" method="POST" enctype='multipart/form-data'
        style="width:70%;background-color:rgb(231 231 231 / 96%);">
        <div class="imgcontainer">
            <span onclick="document.getElementById('addstudent').style.display='none'" class="close"
                title="Close Modal">&times;</span>
        </div>

        <div class="container">
            <div class="s_number">
                <label class="col-sm-6 col-form-label s_num">رقم الطالب</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control s_num_input" name="student_id" value="<?php echo $student_id;?>">
                </div>
            </div>
            <div class=" s_name">
                <label class="col-sm-6 col-form-label s_nam">اسم الطالب</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control s_nam_input" name="student_name" value="<?php echo $student_name;?>">
                </div>
            </div>
            <div class=" s_phone">
                <label class="col-sm-6 col-form-label s_pho"> الهاتف </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control s_pho_input" name="phone" value="<?php echo $phone;?>">
                </div>
            </div>
            <div class=" s_age">
                <label class="col-sm-6 col-form-label s_ag">العمر</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control s_ag_input" name="age" value="<?php echo $age;?>">
                </div>
            </div>
            <div class=" s_sex">
                <label class=" s_s">الجنس:</label>
                <div class=" ">
                    
                <label class=" s_s">ذكر</label>
                    <input type="radio"  name="gender" value="ذكر">
                    
                <label class=" s_s">انثى</label>
                    <input type="radio"  name="gender" value="انثى">
                </div>
            </div>
            <div class="ss">
                <label class="">رقم الصف</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="stud_class_id" value="<?php echo $stud_class_id;?>">
                </div>
            </div>
            <div class="ss2">
                <label class="">رقم الشعبة</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="division_id" value="<?php echo $division_id;?>">
                </div>
            </div>
            <!-- image -->
            <div class="custom-file image">
                <div class="">
                    <input type="file" class="custom-file-input form-image" accept=".png,.jpg" name="img">
                    <label class="custom-file-label" for="img"> الصورة</label>
                  
                </div>
            </div>
            <div class="ss3">
                <label class=""> كلمة السر</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="password" value="<?php echo $password;?>">
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


