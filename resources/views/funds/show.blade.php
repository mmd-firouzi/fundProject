<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>مدیریت صندوق</title>
    <style>
        body {
            font-family: Tahoma, sans-serif;
            direction: rtl;
            text-align: right;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }
        .detail {
            margin-bottom: 20px;
        }
        .button {
            padding: 5px 10px;
            text-decoration: none;
            color: white;
            background-color: #4CAF50;
            border-radius: 5px;
        }
        .delete-button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 0;
            text-decoration: none;
            color: white;
            background-color: red;
            border-radius: 5px;
        }
        .delete-button:hover {
            background-color: darkred;
        }
        .button.edit{
            background-color: #2196F3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>مدیریت صندوق: {{ $fund->fundName }}</h1>

        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="detail">
            <strong>نام صندوق:</strong> {{ $fund->fundName }}
        </div>
        <div class="detail">
            <strong>نام مدیر:</strong> {{ $fund->adminName }}
        </div>
        <div class="detail">
            <strong>موجودی صندوق:</strong> {{ $fund->totalAmount }}
        </div>
        <div class="detail">
            <strong>تاریخ ایجاد:</strong> {{ $fund->createDate }}
        </div>
        <div class="detail">
            <strong>مبلغ ورودی:</strong> {{ $fund->entry }}
        </div>
        <div class="detail">
            <strong>پرداخت ماهانه:</strong> {{ $fund->monthlyPay }}
        </div>
        <div class="detail">
            <strong>شماره حساب:</strong> {{ $fund->bankAccount }}
        </div>
        <div class="detail">
            <strong>حداکثر اعضا:</strong> {{ $fund->maxMember }}
        </div>
        <div class="detail">
            <strong>اطلاعات:</strong> {{ $fund->info }}
        </div>

        <div class="actions">

            <a href = "{{route('users.storeFundId', $fund->ID)}}" class="button edit">مشاهده اعضا</a>
            <br>
            <br>
            <br>
            <a href = "{{route('users.storeFundId', $fund->ID)}}" class="button edit">اضافه کردن عضو جدید</a>
            <br>
            <br>
                <form action="{{ route('deleteFund', $fund->ID) }}" method="POST" onsubmit="return confirm('آیا مطمئن هستید؟')">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-button">حذف صندوق</button>
            </form>
        </div>
        <br>
        <a href="{{ route('showFunds') }}" class="button">بازگشت به لیست صندوق‌ها</a>


    </div>
</body>
</html>
