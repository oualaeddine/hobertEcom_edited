<?php require_once 'views/head.php'; ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

    <ul class="breadcrumb pb30">
  <li><a href="<?php echo base_url("admin"); ?>">الرئيسية</a></li>
  <li class="active">طلبات .</li>
</ul>


    <form method="get" action="<?php echo base_url("admin/csv"); ?>">
	<table id="no-more-tables" class="table table-bordered" role="table">
		<thead>
			<tr>
				<th width="2%"><input id="check-all" type="checkbox" /></th>
				<th width="15%" class="text-right">المنتوج</th>
				<th width="15%" class="text-right">إسم المشتري</th>
				<th width="10%" class="text-right">رقم الهاتف</th>
				<th width="10%" class="text-right">المدينة</th>
				<th width="10%" class="text-right">البلدية</th>
				<th width="10%" class="text-right">تاريخ الطلب</th>
				<th width="10%" class="text-right">سعر الطلب</th>
				<th width="15%" class="text-right">الحالة</th>
				<th width="30%" class="text-right">التحكم</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($msg as $key) {  ?>
			<tr>
				<td data-title="#" class="id-checksele"><input class="check" type="checkbox" name="order[]" value="<?php echo $key->id; ?>"></td>
				<td data-title="العنوان"><?php $pcs = json_decode($key->products, TRUE); foreach($pcs as $p => $q) { echo get_info("products", $p, "title")." / العدد <b>".$q."</b><br />"; }; ?></td>
				<td data-title="العنوان"><?php echo $key->name; ?></td>
				<td data-title="العنوان"><?php echo $key->tele; ?></td>
				<td data-title="العنوان"><?php echo $key->city; ?></td>
				<td data-title="العنوان"><?php echo $key->state; ?></td>
				<td data-title="العنوان"><?php echo date("Y-m-d H:i", $key->date); ?></td>
				<td data-title="العنوان"><?php echo $key->totalPrice; ?> د.ج</td>
				<td data-title="العنوان"><?php switch ($key->status) {
					case 1:
						echo "بإنتظار التأكيد";
						break;
					
					case 2:
						echo "بإنتظار الشحن";
						break;
					
					case 3:
						echo "تم الإرسال";
						break;

					case 0:
						echo "تم إلغاء الطلب";
						break;

					default:
						echo "تم الإستلام";
						break;
				} ?></td>
				<td data-title="التحكم" class="text-center">
					<a href="<?php echo base_url("admin/detiales/$key->id"); ?>" class="btn btn-default btn-xs"><i class="fa fa-pencil-square"></i> التفاصيل</a>
					<a href="<?php echo base_url("admin/delt/orders/$key->id/requests"); ?>" class="btn btn-danger btn-xs"><i class="fa fa-minus-square"></i> حذف</a>
				</td>
			</tr>
		<?php } ?>

		</tbody>		
	</table>

	<div class="center"><?php echo $links; ?></div>

	
	<div class="col-md-12">
		<a href="<?php echo isset($tp) ? base_url("admin/csv/$tp") : base_url("admin/csv"); ?>" class="btn btn-success">تحميل الكل</a>
		<button type="submit" href="<?php echo base_url("admin/csv"); ?>" class="btn btn-success">تحميل مختار</button>
	</div>
    </form>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
        $('#no-more-tables').DataTable();
        document.getElementById('check-all').onclick = function() {
            let checkboxes = document.querySelectorAll('input[type="checkbox"]');
            for (let checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        }
    } );
</script>
<script>

</script>
<?php require_once 'views/sidebar.php'; require_once 'views/foot.php';