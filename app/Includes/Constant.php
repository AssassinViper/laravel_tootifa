<?php

namespace App\Includes;

class Constant
{
    public static $SUCCESS = 1000;
    public static $INVALID_PHONE_NUMBER = 1101;
    public static $INVALID_PASSWORD = 1102;
    public static $INVALID_TOKEN = 1103;
    public static $REPETITIVE_NATIONAL_CODE = 1107;
    public static $REPETITIVE_PHONE_NUMBER = 1108;
    public static $INVALID_VERIFICATION_CODE = 1109;
    public static $INVALID_REQUEST = 1112;
    public static $INVALID_EMAIL = 1113;
    public static $INVALID_FILE = 1114;
    public static $SERVER_ISSUE = 1115;
    public static $SERVER_NOT_AVAILABLE = 1119;
    public static $INVALID_ID = 1120;
    public static $VIDEO_UNAVAILABLE = 1121;
    public static $SMS_NOT_SENT = 1122;
    public static $PLAN_NOT_FREE = 1123;
    public static $INVALID_INSTALLMENT_ID = 1124;
    public static $DOWNLOAD_UNAVAILABLE = 1125;
    public static $USER_ALREADY_VERIFIED = 1126;
    public static $INVALID_GROUP_HIERARCHY = 1127;
    public static $REPETITIVE_TITLE = 1128;
    public static $FILE_SIZE_LIMIT_EXCEEDED = 1129;
    public static $INVALID_VALUE = 1130;
    public static $INVALID_EDIT_TYPE = 1131;
    public static $GROUP_NOT_EXISTS = 1132;
    public static $RELATED_ENTITIES = 1133;
    public static $COMMENTS_NOT_OPEN = 1134;

    public static $GENDER_MALE = 1;
    public static $GENDER_MALE_TITLE = "پسر";
    public static $GENDER_FEMALE = 0;
    public static $GENDER_FEMALE_TITLE = "دختر";

    public static $PAYMENT_SUCCEEDED = 1;
    public static $PAYMENT_FAILED = 0;

    public static $SATURDAY = "شنبه";
    public static $SUNDAY = "یکشنبه";
    public static $MONDAY = "دوشنبه";
    public static $TUESDAY = "سه شنبه";
    public static $WEDNESDAY = "چهارشنبه";
    public static $THURSDAY = "پنجشنبه";
    public static $FRIDAY = "جمعه";

    public static $DAYS = ["شنبه", "یکشنبه", "دوشنبه", "سه شنبه", "چهارشنبه", "پنجشنبه", "جمعه"];

    public static $CONTENT_TYPE_VIDEO = "ct_video";
    public static $CONTENT_TYPE_IMAGE = "ct_image";
    public static $CONTENT_TYPE_DOCUMENT = "ct_document";
    public static $CONTENT_TYPE_VOICE = "ct_voice";
    public static $CONTENT_TYPE_TEXT = "ct_text";
    public static $CONTENT_TYPE_SLIDER = "ct_slider";

    public static $HOLDING_STATUS_COMING_SOON = "coming_soon";
    public static $HOLDING_STATUS_IS_HOLDING = "is_holding";
    public static $HOLDING_STATUS_FINISHED = "finished";

    public static $VALIDATION_STATUS_NOT_VALID = "not_valid";
    public static $VALIDATION_STATUS_IS_CHECKING = "is_checking";
    public static $VALIDATION_STATUS_VALID = "valid";

    public static $DISCOUNT_TYPE_PERCENT = "dt_percent";
    public static $DISCOUNT_TYPE_PRICE = "dt_price";

    public static $MAIN_CP_LIST_DEFAULT_TYPE_MOST_PURCHASED = "most_purchased";
    public static $MAIN_CP_LIST_DEFAULT_TYPE_HIGHEST_SCORE = "highest_score";
    public static $MAIN_CP_LIST_DEFAULT_TYPE_NEWEST = "newest";
    public static $MAIN_CP_LIST_DEFAULT_TYPE_MOST_VISITED = "most_visited";

    public static $SM_MOST_VISITS = "sm_most_visits";
    public static $SM_LEAST_VISITS = "sm_least_visits";
    public static $SM_MOST_SELLS = "sm_most_sells";
    public static $SM_LEAST_SELLS = "sm_least_sells";
    public static $SM_NEWEST = "sm_newest";
    public static $SM_OLDEST = "sm_oldest";
    public static $SM_LOWEST_PRICE = "sm_lowest_price";
    public static $SM_HIGHEST_PRICE = "sm_highest_price";

    public static $MAIN_LIST_DEFAULT_TYPE_LAST_CREATED = "mldt_last_created";
    public static $MAIN_LIST_DEFAULT_TYPE_MOST_SELLS = "mldt_most_sells";
    public static $MAIN_LIST_DEFAULT_TYPE_MOST_VISITED = "mldt_most_visited";
    public static $MAIN_LIST_DEFAULT_TYPE_HIGHEST_SCORE = "mldt_highest_score";

    public static $LT_INSTAGRAM = "lt_instagram";
    public static $LT_EMAIL = "lt_email";
    public static $LT_TELEGRAM = "lt_telegram";
    public static $LT_WHATSAPP = "lt_whatsapp";

    public static $FILE_ACTION_CREATE = "create";
    public static $FILE_ACTION_UPDATE = "update";
    public static $FILE_ACTION_DELETE = "delete";

    public static $COVER_SIZE_LIMIT = 1200;
    public static $COVER_SIZE_NAME_LIMIT = 1000;

    public static $LOGO_SIZE_LIMIT = 900;
    public static $LOGO_SIZE_NAME_LIMIT = 700;

    //**************************************************** EDIT PARAMS *************************************************
    public static $EDIT_PARAM_LOGO = "ep_logo";
    public static $EDIT_PARAM_COVER = "ep_cover";
    public static $EDIT_PARAM_TITLE = "ep_title";
    public static $EDIT_PARAM_DURATION = "ep_duration";
    public static $EDIT_PARAM_PRICE = "ep_price";
    public static $EDIT_PARAM_SUGGESTED_COURSES = "ep_suggested_courses";
    public static $EDIT_PARAM_SUGGESTED_POSTS = "ep_suggested_posts";
    public static $EDIT_PARAM_HOLDING_STATUS = "ep_holding_status";
    public static $EDIT_PARAM_SHORT_DESC = "ep_short_desc";
    public static $EDIT_PARAM_LONG_DESC = "ep_long_desc";
    public static $EDIT_PARAM_RELEASE_DATE = "ep_release_date";
    public static $EDIT_PARAM_COMMENTS_AVAILABILITY = "ep_comments_availability";
    public static $EDIT_PARAM_COMMENTS_VALIDITY = "ep_comments_validity";
    public static $EDIT_PARAM_SUBJECTS = "ep_comments_subjects";
    public static $EDIT_PARAM_REQUIREMENT = "ep_comments_requirement";
    public static $EDIT_PARAM_CONTENT_HIERARCHY = "ep_content_hierarchy";
    public static $EDIT_PARAM_COURSE_EDUCATORS = "ep_course_educators";
    public static $EDIT_PARAM_POST_WRITERS = "ep_post_writers";
    public static $EDIT_PARAM_GROUPS = "ep_groups";
    public static $EDIT_PARAM_TAGS = "ep_tags";
    public static $EDIT_PARAM_CONTENT_VIDEO_ADD = "ep_content_video_add";
    public static $EDIT_PARAM_CONTENT_VIDEO_UPDATE = "ep_content_video_update";
    public static $EDIT_PARAM_CONTENT_VIDEO_DELETE = "ep_content_video_delete";
    public static $EDIT_PARAM_CONTENT_DOCUMENT_ADD = "ep_content_document_add";
    public static $EDIT_PARAM_CONTENT_DOCUMENT_UPDATE = "ep_content_document_update";
    public static $EDIT_PARAM_CONTENT_DOCUMENT_DELETE = "ep_content_document_delete";
    public static $EDIT_PARAM_CONTENT_VOICE_ADD = "ep_content_voice_add";
    public static $EDIT_PARAM_CONTENT_VOICE_UPDATE = "ep_content_voice_update";
    public static $EDIT_PARAM_CONTENT_VOICE_DELETE = "ep_content_voice_delete";
    public static $EDIT_PARAM_CONTENT_SLIDER_ADD = "ep_content_slider_add";
    public static $EDIT_PARAM_CONTENT_SLIDER_UPDATE = "ep_content_slider_update";
    public static $EDIT_PARAM_CONTENT_SLIDER_DELETE = "ep_content_slider_delete";
    public static $EDIT_PARAM_CONTENT_TEXT_ADD = "ep_content_text_add";
    public static $EDIT_PARAM_CONTENT_TEXT_UPDATE = "ep_content_text_update";
    public static $EDIT_PARAM_CONTENT_TEXT_DELETE = "ep_content_text_delete";
    public static $EDIT_PARAM_CONTENT_IMAGE_ADD = "ep_content_image_add";
    public static $EDIT_PARAM_CONTENT_IMAGE_UPDATE = "ep_content_image_update";
    public static $EDIT_PARAM_CONTENT_IMAGE_DELETE = "ep_content_image_delete";
    public static $EDIT_PARAM_COURSE_INTRO_VIDEO_ADD = "ep_intro_video_add";
    public static $EDIT_PARAM_COURSE_INTRO_VIDEO_UPDATE = "ep_intro_video_update";
    public static $EDIT_PARAM_COURSE_INTRO_VIDEO_DELETE = "ep_intro_video_delete";
    public static $EDIT_PARAM_COURSE_HEADING_ADD = "ep_course_heading_add";
    public static $EDIT_PARAM_COURSE_HEADING_UPDATE = "ep_course_heading_update";
    public static $EDIT_PARAM_COURSE_HEADING_DELETE = "ep_course_heading_delete";
    public static $EDIT_PARAM_BANNER_COVER = "ep_banner_cover";
    public static $EDIT_PARAM_BANNER_LINK = "ep_banner_link";
    public static $EDIT_PARAM_BANNER_TEXT = "ep_banner_text";
    public static $EDIT_PARAM_BANNER_STATUS = "ep_banner_status";
    public static $EDIT_PARAM_FOOTER_LINKS = "ep_footer_links";
    public static $EDIT_PARAM_COURSE_LIST_ADD = "ep_content_course_list_add";
    public static $EDIT_PARAM_COURSE_LIST_UPDATE = "ep_content_course_list_update";
    public static $EDIT_PARAM_COURSE_LIST_DELETE = "ep_content_course_list_delete";
    public static $EDIT_PARAM_POST_LIST_ADD = "ep_content_post_list_add";
    public static $EDIT_PARAM_POST_LIST_UPDATE = "ep_content_post_list_update";
    public static $EDIT_PARAM_POST_LIST_DELETE = "ep_content_post_list_delete";
    //******************************************************************************************************************


}
