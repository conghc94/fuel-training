<?php

	class Constants
	{
		public static $site_title = 'メンバー管理システム';

		public static $page_title = array(
			'normal' => 'サービスメニュー',
			'login' => 'ログイン',
			'mainmenu' => 'メインメニュー',
			'photoedit' => '写真編集',
			'photolist' => '登録一覧リスト',
			'photomap' => '登録地図',
			'changemail' => 'メールアドレス変更',
			'changepass' => 'パスワード変更',
		);

		//Rikkei TuanDV2 Version 1.1 Start Add 
        public static $type_setting = array(
                ''     => 'なし',
				'1'     => '企業',
				'2'     => '団体',
                '3'     => '研究機関',
                '4'     => '個人',
                '5'     => '地方自治体',
                '6'     => '6 Demo add new type',   
        );

        public static $officer_in_group_setting = array(
				'1'     => '会長',
				'2'     => '副会長',
                '11'     => '運営幹事',
                '12'     => '監査役',
                '21'     => '実務者連絡員',
                '22'     => '参与',
                '23'     => '評議員',
        );
        //Rikkei TuanDV2 Version 1.1 End Add
		
		public static $error_message = array(
				'login_error' => 'ログインに失敗しました。',
				'already_logged_in' => 'すでにログインしています。',
				'expired_csrf_token' => '有効なセッションがありません。',
				'bad_old_password' => '旧パスワードが間違っています。',
				'not_change_mail' => 'メールアドレスの変更はできませんでした。',
				'not_change_user_profile' => 'ユーザー情報の追加・変更はできませんでした。',
				'not_change_user_id_pass' => 'パスワード・ログインIDの追加・変更はできませんでした。',
				'already_exist_user' => '入力したログインIDはすでに登録済みです。',
				'bad_route' => '不正なルートから遷移しています。',
				'not_exist_date' => ':label は 日付として正しくありません。',
				'not_change_photo_data' => '情報の追加・変更はできませんでした。',
		);

		public static $user_group = array(
			'Administrators' => '100',
			'Moderators' => '50',
			'Users' => '1',
		);

		public static $pagenate_config = array(
				'name' => 'bootstrap',
				'per_page' => '200',
				'num_link' => '5',
				'uri_segment' => 'page',
				'show_first' => true,
				'show_last' => true,
		);

		public static $range = 12;

		public static $search_meter = array(
			6 => 128,
			7 => 64,
			8 => 32,
			9 => 16,
			10 => 8,
			11 => 4,
			12 => 2,
			13 => 1,
			14 => 0.5,
			15 => 0.05,
			16 => 0.03,
			18 => 0.01,
			17 => 0.001,
		);


		public static $flag = array(
				'on' => '1',
				'off' => '0',
		);

		public static $publish_status = array(
				'1' => '公開',
				'0' => '非公開',
		);

		public static $commit_status = array(
				'-1' => '確定/未確定両方',
				'1' => '確定',
				'0' => '未確定',
		);

		public static $sendmail_status = array(
				'1' => '送信済み',
				'0' => '未送信',
		);



	}

