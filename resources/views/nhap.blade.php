<html>
    <head>
        <title>Sum Html Textbox Values using jQuery/JavaScript</title>
        <style>
            body {
                font-family: sans-serif;
            }
            #summation {
                font-size: 18px;
                font-weight: bold;
                color:#174C68;
            }
            .txt {
                background-color: #FEFFB0;
                font-weight: bold;
                text-align: right;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    </head>
    <body>
        <table width="300px" border="1" style="border-collapse:collapse;background-color:#E8DCFF">
            <tr>
                <td width="40px">1</td>
                <td>Butter</td>
                <td><input class="txt" type="number" /></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Cheese</td>
                <td><input class="txt" type="number" /></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Eggs</td>
                <td><input class="txt" type="number" name="txt"/></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Milk</td>
                <td><input class="txt" type="number" name="txt"/></td>
            </tr>
            <tr>
                <td>5</td>
                <td>Bread</td>
                <td><input class="txt" type="number" name="txt"/></td>
            </tr>
            <tr>
                <td>6</td>
                <td>Soap</td>
                <td><input class="txt" type="number" name="txt"/></td>
            </tr>
              <tr>
                <td>6</td>
                <td>Soap</td>
                <td><input class="txt" type="number" name="txt"/></td>
            </tr>
     
         <tr id="summation">
            <td>&nbsp;</td>
            <td align="right">Sum :</td>
            <td align="center"> <input  class="tong2" type="number"  id="sum"/> </td>
        </tr>

    </table>
    <table width="300px" border="1" style="border-collapse:collapse;background-color:#E8DCFF">
            <tr>
                <td>5</td>
                <td>Bread</td>
                <td><input class="txt1" type="number" name="txt"/></td>
            </tr>
            <tr>
                <td>6</td>
                <td>Soap</td>
                <td><input class="txt1" type="number" name="txt"/></td>
            </tr>
              <tr>
                <td>6</td>
                <td>Soap</td>
                <td><input class="txt1" type="number" name="txt"/></td>
            </tr>
     
         <tr id="summation">
            <td>&nbsp;</td>
            <td align="right">Sum :</td>
            <td align="center"> <input class="tong2" id="sum1"/> </td>
        </tr>

    </table>
     <td align="center"> <input id="sum4"/> </td>

<script>
        $(document).ready(function(){
            $(".tong2").each(function() {

                $(this).keyup(function(){
                    calculateSum4();
                });
            });

        });

        function calculateSum4() {

            var sum4 = 0;
            $(".tong2").each(function() {
                if(!isNaN(this.value) && this.value.length!=0) {
                    sum4 += parseFloat(this.value);
                }
            });
            $("#sum4").val(sum4);
        }
    </script>
    <script>
        $(document).ready(function(){
            $(".txt1").each(function() {

                $(this).keyup(function(){
                    calculateSum1();
                });
            });

        });

        function calculateSum1() {

            var sum1 = 0;
            $(".txt1").each(function() {
                if(!isNaN(this.value) && this.value.length!=0) {
                    sum1 += parseFloat(this.value);
                }
            });
            $("#sum1").val(sum1);
        }
    </script>


    <script>
        $(document).ready(function(){
            $(".txt").each(function() {

                $(this).keyup(function(){
                    calculateSum();
                });
            });

        });

        function calculateSum() {

            var sum = 0;
            $(".txt").each(function() {
                if(!isNaN(this.value) && this.value.length!=0) {
                    sum += parseFloat(this.value);
                }
            });
            $("#sum").val(sum);
        }
    </script>

<!-- @for($i=0;$i<4;$i++)


<select name="A" class="A{{$i}}">
  <option value=""></option>
  <option value=0.5>0.5</option>
  <option value=0.2>0.2</option>
</select>

<select name="A" class="A{{$i}}" >
     <option value=""></option>

  <option value=0.2>0.2</option>
  <option value=4>4</option>

</select>
<select name="A" class="A{{$i}}">
     <option value=""></option>
  <option value=1>1</option>
  <option value=2>2</option>
  <option value=3>3</option>
  <option value=4>4</option>
</select>



 


    <p>
    Sum :<span id="sum{{$i}}">0</span>
    </p>
    <script>

        $(".A{{$i}}").change(function() {
        var combined = 0;
        $(".A{{$i}}").each(function() {

          if(!isNaN(this.value) && this.value.length!=0) {
             combined += parseFloat(this.value);
         }
     });
        // $("#sum{{$i}}").html(combined);
        var a1=combined;
        $("#sum{{$i}}").html(a1+a2);
    }).trigger("change");
        $(document).ready(function(){
            $(".txt").each(function() {

                $(this).keyup(function(){
                    calculateSum();
                });
            });

        });
        function calculateSum() {
            var sum = 0;
            $(".txt").each(function() {
                if(!isNaN(this.value) && this.value.length!=0) {
                    sum += parseFloat(this.value);
                }
            });
            // $("#sum").html(sum);
            var a2=sum;

        }

        // $("#sum{{$i}}").html(a1+a2);

  </script> 
      <script>
        $(document).ready(function(){
        $(".txt").each(function() {

            $(this).keyup(function(){
                calculateSum();
            });
        });

    });
        function calculateSum() {
            var sum = 0;
            $(".txt").each(function() {
                if(!isNaN(this.value) && this.value.length!=0) {
                    sum += parseFloat(this.value);
                }
            });
            $("#sum").html(sum);
        }
</script> 

<input name="points" value="30" >
<td><input step="0.25" max="0.5" class="txt" type="number" name="txt"/></td>


  @endfor
 -->
   

  <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <script>
     $(document).ready(function() {
      $(".expenses").on('keyup change', calculateSum);
       });

     function calculateSum() {
      var $input = $(this);
      var $row = $input.closest('tr');
      var sum = 0;

      $row.find(".expenses").each(function() {
        sum += parseFloat(this.value) || 0;
    });

      $row.find(".expenses_sum").val(sum.toFixed(1));
  }

</script>
<table border="1">
  <tr>
    <th>sl</th>
    <th>TA</th>
    <th>DA</th>
    <th>HA</th>
    <th>Total</th>
  </tr>
  <tr>
    <td>1</td>
    <td><input class="expenses"></td>
    <td><input class="expenses"></td>
    <td><input class="expenses"></td>
    <td><input class="expenses_sum"></td>
  </tr>
  <tr>
    <td>2</td>
    <td><input class="expenses"></td>
    <td><input class="expenses"></td>
    <td><input class="expenses"></td>
    <td><input class="expenses_sum"></td>
  </tr>
  <tr>
    <td>3</td>
    <td><input class="expenses"></td>
    <td><input class="expenses"></td>
    <td><input class="expenses"></td>
    <td><input class="expenses_sum"></td>
  </tr>
</table> -->

</body>
</html>


<table class="table table-bordered" style="width:1140px; font-family: times new roman; font-size: 11px;">
                <thead>
                    <tr>
                        <th rowspan="4" style="width:20px; font-size: 13px;">TT</th>
                        <th  style="width:60px;">TTLV</th>
                        <th rowspan="2" colspan="4" style="width:10px;">Ch??? s??? c???i c??ch HC n??m 2019</th>
                        <td colspan="4" style="text-align: center;">1</td>
                        <td colspan="4" style="text-align: center;">2</td>
                        <td colspan="4" style="text-align: center;">3</td>
                        <td colspan="4" style="text-align: center;">4</td>
                        <td colspan="4" style="text-align: center;">5</td>
                        <td colspan="4" style="text-align: center;">6</td>
                        <td colspan="4" style="text-align: center;">7</td>
                        <td colspan="4" style="text-align: center;">8</td>
                        <td colspan="4" style="text-align: center;">9</td>

                    </tr>
                    <tr>

                        <!-- <th>1</th> -->
                        <th>L??nh v???c</th>
                        <!-- <th>3</th> -->
                        <th colspan="4" style="text-align: center; width: 100px;font-size:12px;">C??NG T??C THAM M??U UBND HUY???N BAN H??NH V??N B???N CH??? ?????O, ??I???U H??NH CCHC</th>
                        <th colspan="4" style="text-align: center; width: 100px;font-size:12px;">THAM M??U X??Y D???NG V?? T??? CH???C TH???C HI???N V??N B???N QUY PH???M PH??P LU???T (VBQPPL)</th>
                        <th colspan="4" style="text-align: center; width: 100px;font-size:12px;">C???I C??CH TH??? T???C H??NH CH??NH</th>
                        <th colspan="4" style="text-align: center; width: 100px;font-size:12px;">C???I C??CH T??? CH???C B??? M??Y H??NH CH??NH NH?? N?????C</th>
                        <th colspan="4" style="text-align: center; width: 100px;font-size:12px;">X??Y D???NG V?? N??NG CAO CH???T L?????NG ?????I NG?? C??N B???, C??NG CH???C</th>
                        <th colspan="4" style="text-align: center; width: 100px;font-size:12px;">C???I C??CH T??I CH??NH C??NG</th>
                        <th colspan="4" style="text-align: center; width: 100px;font-size:12px;">HI???N ?????I H??A H??NH CH??NH</th>
                        <th colspan="4" style="text-align: center; width: 100px;font-size:12px;">TH???C HI???N C?? CH??? M???T C???A, C?? CH??? M???T C???A LI??N TH??NG</th>
                        <th colspan="4" style="text-align: center; width: 100px;font-size:12px;">T??C ?????NG C???I C??CH H??NH CH??NH ?????N PH??T TRI???N KINH T??? - X?? H???I</th>


                    </tr>

                    <tr>
                        <!--    <th>1</th> -->
                        <th>??i???m t???i ??a</th>
                        <th colspan="4">100</th>
                        <th colspan="4">20.5</th>
                        <th colspan="4">10.00</th>
                        <th colspan="4">10.00</th>
                        <th colspan="4">6.00</th>
                        <th colspan="4">10.05</th>
                        <th colspan="4">6.00</th>
                        <th colspan="4">14.00</th>
                        <th colspan="4">9.00</th>
                        <th colspan="4">14.00</th>


                    </tr>
                    <tr>
                        <!--    <th>1</th> -->
                        <th>??i???m ????nh gi??</th>
                        <th style="width:50px;">Th???m ?????nh</th>
                        <th style="width:50px;">??TXHH</th>
                        <th style="width:50px;" >T???ng ??i???m</th>
                        <th style="width:50px;">Ch??? s??? (%)</th>
                        <th style="width:50px;">????nh gi?? qua ??TXHH</th>
                        <th style="width:50px;">UBND Huy???n  th???m ?????nh</th>
                        <th style="width:50px;">T???ng ??i???m</th>
                        <th style="width:50px;">Ch??? s???(%)</th>
                        <th style="width:50px;">????nh gi?? qua ??TXHH</th>
                        <th style="width:50px;">UBND Huy???n  th???m ?????nh</th>
                        <th style="width:50px;">T???ng ??i???m</th>
                        <th style="width:50px;">Ch??? s???(%)</th>
                        <th style="width:50px;">????nh gi?? qua ??TXHH</th>
                        <th style="width:50px;">UBND Huy???n  th???m ?????nh</th>
                        <th style="width:50px;">T???ng ??i???m</th>
                        <th style="width:50px;">Ch??? s???(%)</th>
                        <th style="width:50px;">????nh gi?? qua ??TXHH</th>
                        <th style="width:50px;">UBND Huy???n  th???m ?????nh</th>
                        <th style="width:50px;">T???ng ??i???m</th>
                        <th style="width:50px;">Ch??? s???(%)</th>
                        <th style="width:50px;">????nh gi?? qua ??TXHH</th>
                        <th style="width:50px;">UBND Huy???n  th???m ?????nh</th>
                        <th style="width:50px;">T???ng ??i???m</th>
                        <th style="width:50px;">Ch??? s???(%)</th>
                        <th style="width:50px;">????nh gi?? qua ??TXHH</th>
                        <th style="width:50px;">UBND Huy???n  th???m ?????nh</th>
                        <th style="width:50px;">T???ng ??i???m</th>
                        <th style="width:50px;">Ch??? s???(%)</th>
                        <th style="width:50px;">????nh gi?? qua ??TXHH</th>
                        <th style="width:50px;">UBND Huy???n  th???m ?????nh</th>
                        <th style="width:50px;">T???ng ??i???m</th>
                        <th style="width:50px;">Ch??? s???(%)</th>
                        <th style="width:50px;">????nh gi?? qua ??TXHH</th>
                        <th style="width:50px;">UBND Huy???n  th???m ?????nh</th>
                        <th style="width:50px;">T???ng ??i???m</th>
                        <th style="width:50px;">Ch??? s???(%)</th>
                        <th style="width:50px;">????nh gi?? qua ??TXHH</th>
                        <th style="width:50px;">UBND Huy???n  th???m ?????nh</th>
                        <th style="width:50px;">T???ng ??i???m</th>
                        <th style="width:50px;">Ch??? s???(%)</th>


                    </tr>


                </thead>
                <tbody>
                    
                    @foreach($quantri as $qt)
                    <?php 
                    $tongtieuchi_sum=0;
                    $tongtieuchi_tp_sum=0;
                    $linhvuc_diem_bc_sum =DB::table('linhvuc_diem')->where('id_phong',$qt->id)->where('date',$ite)->get();
                    foreach ($linhvuc_diem_bc_sum as $key_sum) {
                        $tieuchi_diem_bc_sum =DB::table('tieuchi_diem')->where('id_linhvuc',$key_sum->id)->where('id_phong',$qt->id)->where('date',$ite)->get();


                        foreach ($tieuchi_diem_bc_sum as $key1_sum) {
                            if($key1_sum->diem_tham_dinh !=null){
                                $tongtieuchi_sum=$tongtieuchi_sum+$key1_sum->diem_tham_dinh;
                            }else{
                                $tongtieuchi_sum=$tongtieuchi_sum+0;
                            }
                            $tieuchi_thanhphan_diem_sum=DB::table('tieuchithanhphan_diem')->where('id_tieuchi',$key1_sum->id)->where('id_phong',$qt->id)->where('date',$ite)->get();

                            foreach ($tieuchi_thanhphan_diem_sum as $key2_sum) {
                                if($key2_sum->diem_tham_dinh !=null){
                                    $tongtieuchi_tp_sum=$tongtieuchi_tp_sum+$key2_sum->diem_tham_dinh;
                                }else{
                                    $tongtieuchi_tp_sum=$tongtieuchi_tp_sum+0;
                                }
                            }
                        }

                    }

                    ?>
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$qt->namclass}}</td>
                        <td>{{$tongtieuchi_sum+$tongtieuchi_tp_sum}}</td>
                        <td>0</td>
                        <td>{{$tongtieuchi_sum+$tongtieuchi_tp_sum}}</td>
                        <td>{{$tongtieuchi_sum+$tongtieuchi_tp_sum}}%</td>
                        <?php 
                        
                        $linhvuc_diem_bc =DB::table('linhvuc_diem')->where('id_phong',$qt->id)->where('date',$ite)->get();
                        ?>

                        @foreach($linhvuc_diem_bc as $key)
                        <?php 
                        $tongtieuchi=0;
                        $tongtieuchi_tp=0;
                        $tieuchi_diem_bc =DB::table('tieuchi_diem')->where('id_linhvuc',$key->id)->where('id_phong',$qt->id)->where('date',$ite)->get();
                        foreach ($tieuchi_diem_bc as $key1) {
                            if($key1->diem_tham_dinh !=null){
                                $tongtieuchi=$tongtieuchi+$key1->diem_tham_dinh;
                            }else{
                                $tongtieuchi=$tongtieuchi+0;
                            }
                            $tieuchi_thanhphan_diem=DB::table('tieuchithanhphan_diem')->where('id_tieuchi',$key1->id)->where('id_phong',$qt->id)->where('date',$ite)->get();

                            foreach ($tieuchi_thanhphan_diem as $key2) {
                                if($key2->diem_tham_dinh !=null){
                                    $tongtieuchi_tp=$tongtieuchi_tp+$key2->diem_tham_dinh;
                                }else{
                                    $tongtieuchi_tp=$tongtieuchi_tp+0;
                                }

                            }
                            
                        }
                        $tongtieuchi_chuan=0;
                        $tongtieuchi_tp_chuan=0;
                        $tieuchi =DB::table('tieuchi')->where('id_linhvuc',$key->id)->get();
                        foreach ($tieuchi as $key_c_1) {
                            if($key_c_1->scores_max !=null){
                                $tongtieuchi_chuan=$tongtieuchi_chuan+$key_c_1->scores_max;
                            }else{
                                $tongtieuchi_chuan=$tongtieuchi_chuan+0;
                            }
                        }


                        ?>
                        <td>0</td>
                        <td>{{$tongtieuchi+$tongtieuchi_tp}}</td>
                        <td>{{$tongtieuchi+$tongtieuchi_tp}}</td>
                        <td>{{round((($tongtieuchi+$tongtieuchi_tp)/$tongtieuchi_chuan)*100,2)}}%</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
                    <td style="width:50px;">????nh gi?? qua ??TXHH</td>
                        <td style="width:50px;">UBND Huy???n  th???m ?????nh</td>
                        
                        
                        <td style="width:50px;">????nh gi?? qua ??TXHH</td>
                        <td style="width:50px;">UBND Huy???n  th???m ?????nh</td>
                        
                        
                        <td style="width:50px;">????nh gi?? qua ??TXHH</td>
                        <td style="width:50px;">UBND Huy???n  th???m ?????nh</td>
                        
                        
                        <td style="width:50px;">????nh gi?? qua ??TXHH</td>
                        <td style="width:50px;">UBND Huy???n  th???m ?????nh</td>
                        
                        
                        <td style="width:50px;">????nh gi?? qua ??TXHH</td>
                        <td style="width:50px;">UBND Huy???n  th???m ?????nh</td>
                        
                        
                        <td style="width:50px;">????nh gi?? qua ??TXHH</td>
                        <td style="width:50px;">UBND Huy???n  th???m ?????nh</td>
                        
                        
                        <td style="width:50px;">????nh gi?? qua ??TXHH</td>
                        <td style="width:50px;">UBND Huy???n  th???m ?????nh</td>
                        
                        
                        <td style="width:50px;">????nh gi?? qua ??TXHH</td>
                        <td style="width:50px;">UBND Huy???n  th???m ?????nh</td>
                        
                        
                      <td style="width:50px;">????nh gi?? qua ??TXHH</td>
                        <td style="width:50px;">UBND Huy???n  th???m ?????nh</td>