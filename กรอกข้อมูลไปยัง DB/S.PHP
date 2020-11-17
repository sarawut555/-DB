                              <?php 
                                  require_once('conDB1.php');

                                  if (isset($_REQUEST['btn_insert'])) {
                                      $category = $_REQUEST['txt_category'];
                                      $machinenumber = $_REQUEST['txt_machinenumber'];
                                   

                                      if (empty($category)) {
                                          $errorMsg = "Please enter Firstname";
                                        } else if (empty($machinenumber)) {
                                          $errorMsg = "please Enter Department";    
                                      } else {
                                          try {
                                              if (!isset($errorMsg)) {
                                                  $insert_stmt = $db->prepare("INSERT INTO tbl_repairnotification(category, machinenumber) 
                                                  VALUES (:fcategory, :fmachinenumber)");
                                                  //INSERT INTO tbl_repairnotification(category, machinenumber) ชื่อแต่ละคอลัมในตาราง

                                                  $insert_stmt->bindParam(':fcategory', $category);
                                                  $insert_stmt->bindParam(':fmachinenumber', $machinenumber);
                                                 

                                                  if ($insert_stmt->execute()) {
                                                      $insertMsg = "แทรกเรียบร้อยแล้ว...";
                                                      header("refresh:2;S.php");
                                                  }
                                              }
                                          } catch (PDOException $e) {
                                              echo $e->getMessage();
                                          }
                                      }
                                  }
                              ?>
   

                    <!-- ฟอมแจ้ง ข้อความ เวลากรอกข้อมูลเสร็จ -->
                    <?php 
                        if (isset($errorMsg)) {
                     ?>
                         <div class="alert alert-danger">
                             <strong>Wrong! <?php echo $errorMsg; ?></strong>
                         </div>
                     <?php } ?>
                     

                     <?php 
                         if (isset($insertMsg)) {
                     ?>
                         <div class="alert alert-success">
                             <strong>สำเร็จ! <?php echo $insertMsg; ?></strong>
                         </div>
                     <?php } ?>
                     <script src="js/slim.js"></script>
                     <script src="js/popper.js"></script>
                     <script src="js/bootstrap.js"></script>
                    <!-- ฟอมแจ้ง ข้อความ เวลากรอกข้อมูลเสร็จ -->

                    <!-- ฟอมกรอกข้อมูล -->
                    <form method="post" class="form-horizontal mt-5">

                        <!--  Box กรอกข้อมูล -->
                        <div class="row">
                            <div class=" col-md" style=" color: #00b300; ">ชื่อ .
						        <div class="input-group-prepend">
							        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
					            </div>
                                    <input type="text" name="txt_category" class="form-control"  >   
                            </div>

                            <div class=" col-md" style=" color: #00b300; ">นามสกุล.
                                <div class="input-group-prepend">
                                   <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                    <input type="text" name="txt_machinenumber" class="form-control"  >
                            </div>
                        </div>
                        <!--  Box กรอกข้อมูล -->


                                 <!-- บรรทัดปุ่มยืนยัน -->
                                 <div class="container">
                                     <div class="row">
                                                 <div class="form-group text-center">
                                                 <div class="col-md-12 mt-3">
                                                      <input type="submit" name="btn_insert" class="btn btn-success" value="Insert">
                                                      <a href="S.php" class="btn btn-danger">Cancel</a>
                                                </div>
                                                </div>
                                     </div>
                                 </div>
                                 <!-- บรรทัดปุ่มยืนยัน -->
                     </form>
                    <!-- ฟอมกรอกข้อมูล -->
</body>

</html>