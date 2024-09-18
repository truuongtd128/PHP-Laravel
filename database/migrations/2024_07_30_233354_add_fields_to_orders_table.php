<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('order_code')->unique()->after('id'); // Mã đơn hàng
            $table->string('recipient_name')->after('user_id'); // Tên người nhận
            $table->string('recipient_email')->after('recipient_name'); // Email người nhận
            $table->string('recipient_phone')->after('recipient_email'); // Số điện thoại người nhận
            $table->string('recipient_address')->after('recipient_phone'); // Địa chỉ người nhận
            $table->text('note')->nullable()->after('recipient_address'); // Ghi chú
            $table->string('payment_status')->default('unpaid')->after('status'); // Trạng thái thanh toán
            $table->decimal('sub_total', 10, 2)->after('payment_status'); // Tiền hàng
            $table->decimal('shipping_fee', 10, 2)->after('sub_total'); // Tiền ship
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('order_code');
            $table->dropColumn('recipient_name');
            $table->dropColumn('recipient_email');
            $table->dropColumn('recipient_phone');
            $table->dropColumn('recipient_address');
            $table->dropColumn('note');
            $table->dropColumn('payment_status');
            $table->dropColumn('sub_total');
            $table->dropColumn('shipping_fee');
        });
    }
};
