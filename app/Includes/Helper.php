<?php


namespace App\Includes;


use Exception;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class Helper
{
    public static function uploadFileToDisk($action, $model, $attr, $disk, $destination_path, $type, $file)
    {
        if ($action != 'create') {
            Storage::disk($disk)->delete($model[$attr]);

            if ($action == 'delete') {
                $model[$attr] = null;
                $model->save();
                return null;
            }
        }

        // 1. Generate a new file name
        $new_file_name = md5($file->getClientOriginalName() . time()) . $type;

        // 2. Move the new file to the correct path
        $path = Storage::disk($disk)->putFileAs($destination_path, $file, $new_file_name);

        // 3. Save the complete path to the database
        $model[$attr] = $path;
        $model->save();

        return $path;
    }


    public static function getBase64ImageSize($base64Image)
    { //return memory size in B, KB, MB
        try {
            $size_in_bytes = (int)(strlen(rtrim($base64Image, '=')) * 3 / 4);
            $size_in_kb = $size_in_bytes / 1024;

            return $size_in_kb;
        } catch (Exception $e) {
            return $e;
        }
    }

    public static function getProvinces()
    {
        return array(
            1 => "آذربایجان‌شرقی",
            2 => "آذربایجان‌غربی",
            3 => "اردبیل",
            4 => "اصفهان",
            5 => "البرز",
            6 => "ایلام",
            7 => "بوشهر",
            8 => "تهران",
            9 => "چهارمحال‌و‌بختیاری",
            10 => "خراسان‌جنوبی",
            11 => "خراسان‌رضوی",
            12 => "خراسان‌شمالی",
            13 => "خوزستان",
            14 => "زنجان",
            15 => "سمنان",
            16 => "سیستان‌و‌بلوچستان",
            17 => "فارس",
            18 => "قزوین",
            19 => "قم",
            20 => "كردستان",
            21 => "كرمان ",
            22 => "كرمانشاه",
            23 => "کهگیلویه‌و‌بویراحمد",
            24 => "گلستان",
            25 => "گیلان",
            26 => "لرستان",
            27 => "مازندران",
            28 => "مركزی",
            29 => "هرمزگان",
            30 => "همدان",
            31 => "یزد",
        );
    }

    public static function getCities($p_id)
    {
        $cities = array(
            1 => array(
                1 => "اسکو",
                2 => "اهر",
                3 => "آذرشهر",
                4 => "بستان آباد",
                5 => "بناب",
                6 => "تبریز",
                7 => "جلفا",
                8 => "چاراویماق",
                9 => "خداآفرین",
                10 => "سراب",
                11 => "شبستر",
                12 => "عجب شیر",
                13 => "کلیبر",
                14 => "مراغه",
                15 => "مرند",
                16 => "ملکان",
                17 => "میانه",
                18 => "ورزقان",
                19 => "هریس",
                20 => "هشترود"
            ),
            2 => array(
                1 => "ارومیه",
                2 => "اشنویه",
                3 => "بوكان",
                4 => "پلدشت",
                5 => "پیرانشهر",
                6 => "تكاب",
                7 => "چالدران",
                8 => "چایپاره",
                9 => "خوئ",
                10 => "سردشت",
                11 => "سلماس",
                12 => "شاهین دژ",
                13 => "شوط",
                14 => "ماكو",
                15 => "مهاباد",
                16 => "میاندوآب",
                17 => "نقده"
            ),
            3 => array(
                1 => "اردبیل",
                2 => "بیله سوار",
                3 => "پارس آباد",
                4 => "خلخال",
                5 => "سرعین",
                6 => "كوثر",
                7 => "گرمی",
                8 => "مشگین شهر",
                9 => "نمین",
                10 => "نیر"
            ),
            4 => array(
                1 => "اردستان",
                2 => "اصفهان",
                3 => "آران وبیدگل",
                4 => "برخوار",
                5 => "بو یین و میاندشت",
                6 => "تیران وکرون",
                7 => "چادگان",
                8 => "خمینی شهر",
                9 => "خوانسار",
                10 => "خور و بیابانک",
                11 => "دهاقان",
                12 => "سمیرم",
                13 => "شاهین شهرومیمه",
                14 => "شهرضا",
                15 => "فریدن",
                16 => "فریدونشهر",
                17 => "فلاورجان",
                18 => "کاشان",
                19 => "گلپایگان",
                20 => "لنجان",
                21 => "مبارکه",
                22 => "نایین",
                23 => "نجف آباد",
                24 => "نطنز"
            ),
            5 => array(
                1 => "اشتهارد",
                2 => "ساوجبلاغ",
                3 => "طالقان",
                4 => "فردیس",
                5 => "کرج",
                6 => "نظرآباد"
            ),
            6 => array(
                1 => "ایلام",
                2 => "ایوان",
                3 => "آبدانان",
                4 => "بدره",
                5 => "چرداول",
                6 => "دره شهر",
                7 => "دهلران",
                8 => "سیروان",
                9 => "ملكشاهی",
                10 => "مهران"
            ),
            7 => array(
                1 => "بوشهر",
                2 => "تنگستان",
                3 => "جم",
                4 => "دشتستان",
                5 => "دشتی",
                6 => "دیر",
                7 => "دیلم",
                8 => "عسلویه",
                9 => "كنگان",
                10 => "گناوه"
            ),
            8 => array(
                1 => "اسلامشهر",
                2 => "بهارستان",
                3 => "پاكدشت",
                4 => "پردیس",
                5 => "پیشوا",
                6 => "تهران",
                7 => "دماوند",
                8 => "رباطكریم",
                9 => "رئ",
                10 => "شمیرانات",
                11 => "شهریار",
                12 => "فیروزكوه",
                13 => "قدس",
                14 => "قرچک",
                15 => "ملارد",
                16 => "ورامین"
            ),
            9 => array(
                1 => "اردل",
                2 => "بروجن",
                3 => "بن",
                4 => "سامان",
                5 => "شهركرد",
                6 => "فارسان",
                7 => "كوهرنگ",
                8 => "كیار",
                9 => "لردگان"
            ),
            10 => array(
                1 => "بشرویه",
                2 => "بیرجند",
                3 => "خوسف",
                4 => "درمیان",
                5 => "زیرکوه",
                6 => "سرایان",
                7 => "سربیشه",
                8 => "طبس",
                9 => "فردوس",
                10 => "قائنات",
                11 => "نهبندان"
            ),
            11 => array(
                1 => "باخرز",
                2 => "بجستان",
                3 => "بردسكن",
                4 => "بینالود",
                5 => "تایباد",
                6 => "تربت جام",
                7 => "تربت حیدریه",
                8 => "جغتای",
                9 => "جوین",
                10 => "چناران",
                11 => "خلیل آباد",
                12 => "خواف",
                13 => "خوشاب",
                14 => "داورزن",
                15 => "درگز",
                16 => "رشتخوار",
                17 => "زاوه",
                18 => "سبزوار",
                19 => "سرخس",
                20 => "فریمان",
                21 => "فیروزه",
                22 => "قوچان",
                23 => "كاشمر",
                24 => "كلات",
                25 => "گناباد",
                26 => "مشهد",
                27 => "مه ولات",
                28 => "نیشابور"
            ),
            12 => array(
                1 => "اسفراین",
                2 => "بجنورد",
                3 => "جاجرم",
                4 => "راز و جرگلان",
                5 => "شیروان",
                6 => "فاروج",
                7 => "گرمه",
                8 => "مانه وسملقان"
            ),
            13 => array(
                1 => "امیدیه",
                2 => "اندیکا",
                3 => "اندیمشک",
                4 => "اهواز",
                5 => "ایذه",
                6 => "آبادان",
                7 => "آغاجاری",
                8 => "باغ ملک",
                9 => "باوی",
                10 => "بندرماهشهر",
                11 => "بهبهان",
                12 => "حمیدیه",
                13 => "خرمشهر",
                14 => "دزفول",
                15 => "دشت آزادگان",
                16 => "رامشیر",
                17 => "رامهرمز",
                18 => "شادگان",
                19 => "شوش",
                20 => "شوشتر",
                21 => "کارون",
                22 => "گتوند",
                23 => "لالی",
                24 => "مسجدسلیمان",
                25 => "هفتگل",
                26 => "هندیجان",
                27 => "هویزه"
            ),
            14 => array(
                1 => "ابهر",
                2 => "ایجرود",
                3 => "خدابنده",
                4 => "خرمدره",
                5 => "زنجان",
                6 => "سلطانیه",
                7 => "طارم",
                8 => "ماهنشان"
            ),
            15 => array(
                1 => "آرادان",
                2 => "دامغان",
                3 => "سرخه",
                4 => "سمنان",
                5 => "شاهرود",
                6 => "گرمسار",
                7 => "مهدئ شهر",
                8 => "میامی"
            ),
            16 => array(
                1 => "ایرانشهر",
                2 => "چاه بهار",
                3 => "خاش",
                4 => "دلگان",
                5 => "زابل",
                6 => "زاهدان",
                7 => "زهك",
                8 => "سراوان",
                9 => "سرباز",
                10 => "سیب و سوران",
                11 => "فنوج",
                12 => "قصرقند",
                13 => "كنارك",
                14 => "مهرستان",
                15 => "میرجاوه",
                16 => "نیك شهر",
                17 => "نیمروز",
                18 => "هامون",
                19 => "هیرمند"
            ),
            17 => array(
                1 => "ارسنجان",
                2 => "استهبان",
                3 => "اقلید",
                4 => "آباده",
                5 => "بوانات",
                6 => "پاسارگاد",
                7 => "جهرم",
                8 => "خرامه",
                9 => "خرم بید",
                10 => "خنج",
                11 => "داراب",
                12 => "رستم",
                13 => "زرین دشت",
                14 => "سپیدان",
                15 => "سروستان",
                16 => "شیراز",
                17 => "فراشبند",
                18 => "فسا",
                19 => "فیروزآباد",
                20 => "قیروکارزین",
                21 => "کازرون",
                22 => "کوار",
                23 => "گراش",
                24 => "لارستان",
                25 => "لامرد",
                26 => "مرودشت",
                27 => "ممسنی",
                28 => "مهر",
                29 => "نی ریز"
            ),
            18 => array(
                1 => "البرز",
                2 => "آبیك",
                3 => "آوج",
                4 => "بوئین زهرا",
                5 => "تاكستان",
                6 => "قزوین"
            ),
            19 => array(
                1 => "قم"
            ),
            20 => array(
                1 => "بانه",
                2 => "بیجار",
                3 => "دهگلان",
                4 => "دیواندره",
                5 => "سروآباد",
                6 => "سقز",
                7 => "سنندج",
                8 => "قروه",
                9 => "كامیاران",
                10 => "مریوان"
            ),
            21 => array(
                1 => "ارزوئیه",
                2 => "انار",
                3 => "بافت",
                4 => "بردسیر",
                5 => "بم",
                6 => "جیرفت",
                7 => "رابر",
                8 => "راور",
                9 => "رفسنجان",
                10 => "رودبارجنوب",
                11 => "ریگان",
                12 => "زرند",
                13 => "سیرجان",
                14 => "شهربابك",
                15 => "عنبرآباد",
                16 => "فاریاب",
                17 => "فهرج",
                18 => "قلعه گنج",
                19 => "كرمان",
                20 => "كوهبنان",
                21 => "كهنوج",
                22 => "منوجان",
                23 => "نرماشیر"
            ),
            22 => array(
                1 => "اسلام آبادغرب",
                2 => "پاوه",
                3 => "ثلاث باباجانی",
                4 => "جوانرود",
                5 => "دالاهو",
                6 => "روانسر",
                7 => "سرپل ذهاب",
                8 => "سنقر",
                9 => "صحنه",
                10 => "قصرشیرین",
                11 => "کرمانشاه",
                12 => "کنگاور",
                13 => "گیلانغرب",
                14 => "هرسین"
            ),
            23 => array(
                1 => "باشت",
                2 => "بویراحمد",
                3 => "بهمئی",
                4 => "چرام",
                5 => "دنا",
                6 => "كهگیلویه",
                7 => "گچساران",
                8 => "لنده"
            ),
            24 => array(
                1 => "آزادشهر",
                2 => "آق قلا",
                3 => "بندرگز",
                4 => "تركمن",
                5 => "رامیان",
                6 => "علی آباد",
                7 => "كردكوئ",
                8 => "كلاله",
                9 => "گالیكش",
                10 => "گرگان",
                11 => "گمیشان",
                12 => "گنبدكاووس",
                13 => "مراوه تپه",
                14 => "مینودشت"
            ),
            25 => array(
                1 => "املش",
                2 => "آستارا",
                3 => "آستانه اشرفیه",
                4 => "بندرانزلی",
                5 => "رشت",
                6 => "رضوانشهر",
                7 => "رودبار",
                8 => "رودسر",
                9 => "سیاهكل",
                10 => "شفت",
                11 => "صومعه سرا",
                12 => "طوالش",
                13 => "فومن",
                14 => "لاهیجان",
                15 => "لنگرود",
                16 => "ماسال"
            ),
            26 => array(
                1 => "ازنا",
                2 => "الیگودرز",
                3 => "بروجرد",
                4 => "پلدختر",
                5 => "خرم آباد",
                6 => "دلفان",
                7 => "دورود",
                8 => "دوره",
                9 => "رومشکان",
                10 => "سلسله",
                11 => "کوهدشت"
            ),
            27 => array(
                1 => "آمل",
                2 => "بابل",
                3 => "بابلسر",
                4 => "بهشهر",
                5 => "تنكابن",
                6 => "جویبار",
                7 => "چالوس",
                8 => "رامسر",
                9 => "سارئ",
                10 => "سوادکوه شمالی",
                11 => "سوادكوه",
                12 => "سیمرغ",
                13 => "عباس آباد",
                14 => "فریدونكنار",
                15 => "قائم شهر",
                16 => "کلاردشت",
                17 => "گلوگاه",
                18 => "محمودآباد",
                19 => "میاندورود",
                20 => "نكا",
                21 => "نور",
                22 => "نوشهر"
            ),
            28 => array(
                1 => "اراک",
                2 => "آشتیان",
                3 => "تفرش",
                4 => "خمین",
                5 => "خنداب",
                6 => "دلیجان",
                7 => "زرندیه",
                8 => "ساوه",
                9 => "شازند",
                10 => "فراهان",
                11 => "کمیجان",
                12 => "محلات"
            ),
            29 => array(
                1 => "ابوموسی",
                2 => "بستك",
                3 => "بشاگرد",
                4 => "بندرعباس",
                5 => "بندرلنگه",
                6 => "پارسیان",
                7 => "جاسك",
                8 => "حاجی اباد",
                9 => "خمیر",
                10 => "رودان",
                11 => "سیریك",
                12 => "قشم",
                13 => "میناب"
            ),
            30 => array(
                1 => "اسدآباد",
                2 => "بهار",
                3 => "تویسركان",
                4 => "رزن",
                5 => "فامنین",
                6 => "كبودرآهنگ",
                7 => "ملایر",
                8 => "نهاوند",
                9 => "همدان"
            ),
            31 => array(
                1 => "ابركوه",
                2 => "اردكان",
                3 => "اشکذر",
                4 => "بافق",
                5 => "بهاباد",
                6 => "تفت",
                7 => "خاتم",
                8 => "مهریز",
                9 => "میبد"
            )
        );

        return $cities[$p_id];
    }


}
