<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<title>Invoice <?= html_escape($order->order_no); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>body{background:#f8fafc}.sheet{max-width:900px;margin:30px auto;background:#fff;padding:32px;border-radius:20px;box-shadow:0 10px 25px rgba(15,23,42,.06)}</style>
</head>
<body>
<div class="sheet">
<div class="d-flex justify-content-between align-items-start mb-4">
<div><h2 class="mb-1">Invoice</h2><div class="text-muted">InviteBiz Ops</div></div>
<div class="text-end"><div><strong><?= html_escape($order->order_no); ?></strong></div><div><?= html_escape($order->created_at); ?></div></div>
</div>
<div class="row mb-4">
<div class="col-md-6"><h6>Pelanggan</h6><div><?= html_escape($order->customer_name); ?></div><div><?= html_escape($order->customer_phone); ?></div><div><?= html_escape($order->customer_email); ?></div><div><?= nl2br(html_escape($order->customer_address)); ?></div></div>
<div class="col-md-6 text-md-end"><h6>Ringkasan</h6><div>Status: <strong><?= html_escape(status_label($order->status)); ?></strong></div><div>Payment: <strong><?= html_escape(strtoupper($order->payment_status)); ?></strong></div><div>Metode: <strong><?= html_escape(status_label($order->payment_method)); ?></strong></div></div>
</div>
<table class="table table-bordered">
<thead><tr><th>Product</th><th>Package</th><th>Template</th><th class="text-end">Harga</th></tr></thead>
<tbody><tr><td><?= html_escape(status_label($order->product_type)); ?></td><td><?= html_escape($order->package_name); ?></td><td><?= html_escape($order->template_name); ?></td><td class="text-end"><?= rupiah($order->price); ?></td></tr></tbody>
</table>
<div class="row justify-content-end"><div class="col-md-5"><table class="table"><tr><th>Subtotal</th><td class="text-end"><?= rupiah($order->price); ?></td></tr><tr><th>Discount</th><td class="text-end"><?= rupiah($order->discount); ?></td></tr><tr><th>Final Price</th><td class="text-end"><strong><?= rupiah($order->final_price); ?></strong></td></tr><tr><th>Paid</th><td class="text-end"><?= rupiah($order->paid_amount); ?></td></tr><tr><th>Balance</th><td class="text-end"><strong><?= rupiah(max(0, (float)$order->final_price - (float)$order->paid_amount)); ?></strong></td></tr></table></div></div>
<div class="mt-4"><h6>Catatan</h6><div><?= nl2br(html_escape($order->notes)); ?></div></div>
<div class="mt-4 d-print-none"><button onclick="window.print()" class="btn btn-dark">Print / Save PDF</button></div>
</div>
</body>
</html>
