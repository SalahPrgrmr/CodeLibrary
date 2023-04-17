<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *                                   ATTENTION!
 * If you see this message in your browser (Internet Explorer, Mozilla Firefox, Google Chrome, etc.)
 * this means that PHP is not properly installed on your web server. Please refer to the PHP manual
 * for more details: http://php.net/manual/install.php 
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 */

    include_once dirname(__FILE__) . '/components/startup.php';
    include_once dirname(__FILE__) . '/components/application.php';
    include_once dirname(__FILE__) . '/' . 'authorization.php';


    include_once dirname(__FILE__) . '/' . 'database_engine/mysql_engine.php';
    include_once dirname(__FILE__) . '/' . 'components/page/page_includes.php';

    function GetConnectionOptions()
    {
        $result = GetGlobalConnectionOptions();
        $result['client_encoding'] = 'utf8';
        GetApplication()->GetUserAuthentication()->applyIdentityToConnectionOptions($result);
        return $result;
    }

    
    
    
    // OnBeforePageExecute event handler
    
    
    
    class lessonsPage extends Page
    {
        protected function DoBeforeCreate()
        {
            $this->SetTitle('الدروس');
            $this->SetMenuLabel('الدروس');
    
            $this->dataset = new TableDataset(
                MySqlIConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`lessons`');
            $this->dataset->addFields(
                array(
                    new IntegerField('cat_id'),
                    new IntegerField('id', true, true, true),
                    new StringField('lson_auth'),
                    new StringField('lson_subject'),
                    new DateTimeField('lson_date'),
                    new StringField('lson_short_text'),
                    new StringField('lson_full_text'),
                    new StringField('lson_details'),
                    new StringField('lson_notes'),
                    new StringField('lson_icon'),
                    new StringField('lson_img1'),
                    new StringField('lson_img2'),
                    new StringField('lson_img3'),
                    new StringField('lson_link1'),
                    new StringField('lson_link2'),
                    new StringField('lson_link3'),
                    new StringField('lson_video1'),
                    new StringField('lson_video2'),
                    new StringField('lson_video3'),
                    new StringField('lson_audio1'),
                    new StringField('lson_audio2'),
                    new StringField('lson_audio3'),
                    new StringField('lson_youtube_video1'),
                    new StringField('lson_youtube_video2'),
                    new StringField('lson_youtube_video3'),
                    new StringField('lson_resource1'),
                    new StringField('lson_resource2'),
                    new StringField('lson_resource3'),
                    new IntegerField('lson_status'),
                    new IntegerField('user_id')
                )
            );
            $this->dataset->AddLookupField('cat_id', 'categories', new IntegerField('id'), new StringField('cat_name', false, false, false, false, 'cat_id_cat_name', 'cat_id_cat_name_categories'), 'cat_id_cat_name_categories');
        }
    
        protected function DoPrepare() {
    
        }
    
        protected function CreatePageNavigator()
        {
            $result = new CompositePageNavigator($this);
            
            $partitionNavigator = new PageNavigator('pnav', $this, $this->dataset);
            $partitionNavigator->SetRowsPerPage(10);
            $result->AddPageNavigator($partitionNavigator);
            
            return $result;
        }
    
        protected function CreateRssGenerator()
        {
            return null;
        }
    
        protected function setupCharts()
        {
    
        }
    
        protected function getFiltersColumns()
        {
            return array(
                new FilterColumn($this->dataset, 'cat_id', 'cat_id_cat_name', 'القسم'),
                new FilterColumn($this->dataset, 'id', 'id', 'م'),
                new FilterColumn($this->dataset, 'lson_auth', 'lson_auth', 'الكاتب'),
                new FilterColumn($this->dataset, 'lson_subject', 'lson_subject', 'الموضوغ'),
                new FilterColumn($this->dataset, 'lson_date', 'lson_date', 'تاريخ الانشاء'),
                new FilterColumn($this->dataset, 'lson_short_text', 'lson_short_text', 'الملخص'),
                new FilterColumn($this->dataset, 'lson_full_text', 'lson_full_text', 'النص'),
                new FilterColumn($this->dataset, 'lson_details', 'lson_details', 'التفاصيل'),
                new FilterColumn($this->dataset, 'lson_notes', 'lson_notes', 'الملاحظات'),
                new FilterColumn($this->dataset, 'lson_icon', 'lson_icon', 'الايقونة'),
                new FilterColumn($this->dataset, 'lson_img1', 'lson_img1', 'الصورة الأولى'),
                new FilterColumn($this->dataset, 'lson_img2', 'lson_img2', 'الصورة الثانية'),
                new FilterColumn($this->dataset, 'lson_img3', 'lson_img3', 'الصورة الثالثة'),
                new FilterColumn($this->dataset, 'lson_link1', 'lson_link1', 'الرابط الأول'),
                new FilterColumn($this->dataset, 'lson_link2', 'lson_link2', 'الرابط الثاني'),
                new FilterColumn($this->dataset, 'lson_link3', 'lson_link3', 'الرابط الثالث'),
                new FilterColumn($this->dataset, 'lson_video1', 'lson_video1', 'الفيديو الأول'),
                new FilterColumn($this->dataset, 'lson_video2', 'lson_video2', 'الفيديو الثاني'),
                new FilterColumn($this->dataset, 'lson_video3', 'lson_video3', 'الفيديو الثالث'),
                new FilterColumn($this->dataset, 'lson_audio1', 'lson_audio1', 'الملف الصوتي الاول'),
                new FilterColumn($this->dataset, 'lson_audio2', 'lson_audio2', 'الملف ا لصوتي الثاني'),
                new FilterColumn($this->dataset, 'lson_audio3', 'lson_audio3', 'الملف الصوتي الثالث'),
                new FilterColumn($this->dataset, 'lson_youtube_video1', 'lson_youtube_video1', 'Youtube1st'),
                new FilterColumn($this->dataset, 'lson_youtube_video2', 'lson_youtube_video2', 'Youtube2nd'),
                new FilterColumn($this->dataset, 'lson_youtube_video3', 'lson_youtube_video3', 'Youtube3rd'),
                new FilterColumn($this->dataset, 'lson_resource1', 'lson_resource1', 'المصدر الأول'),
                new FilterColumn($this->dataset, 'lson_resource2', 'lson_resource2', 'المصدر الثاني'),
                new FilterColumn($this->dataset, 'lson_resource3', 'lson_resource3', 'المصدر الثالث'),
                new FilterColumn($this->dataset, 'lson_status', 'lson_status', 'استعراض'),
                new FilterColumn($this->dataset, 'user_id', 'user_id', 'المستخدم')
            );
        }
    
        protected function setupQuickFilter(QuickFilter $quickFilter, FixedKeysArray $columns)
        {
            $quickFilter
                ->addColumn($columns['cat_id'])
                ->addColumn($columns['id'])
                ->addColumn($columns['lson_auth'])
                ->addColumn($columns['lson_subject'])
                ->addColumn($columns['lson_date'])
                ->addColumn($columns['lson_short_text'])
                ->addColumn($columns['lson_full_text'])
                ->addColumn($columns['lson_details'])
                ->addColumn($columns['lson_notes'])
                ->addColumn($columns['lson_icon'])
                ->addColumn($columns['lson_img1'])
                ->addColumn($columns['lson_img2'])
                ->addColumn($columns['lson_img3'])
                ->addColumn($columns['lson_link1'])
                ->addColumn($columns['lson_link2'])
                ->addColumn($columns['lson_link3'])
                ->addColumn($columns['lson_video1'])
                ->addColumn($columns['lson_video2'])
                ->addColumn($columns['lson_video3'])
                ->addColumn($columns['lson_audio1'])
                ->addColumn($columns['lson_audio2'])
                ->addColumn($columns['lson_audio3'])
                ->addColumn($columns['lson_youtube_video1'])
                ->addColumn($columns['lson_youtube_video2'])
                ->addColumn($columns['lson_youtube_video3'])
                ->addColumn($columns['lson_resource1'])
                ->addColumn($columns['lson_resource2'])
                ->addColumn($columns['lson_resource3'])
                ->addColumn($columns['lson_status'])
                ->addColumn($columns['user_id']);
        }
    
        protected function setupColumnFilter(ColumnFilter $columnFilter)
        {
            $columnFilter
                ->setOptionsFor('cat_id')
                ->setOptionsFor('lson_date');
        }
    
        protected function setupFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
            $main_editor = new DynamicCombobox('cat_id_edit', $this->CreateLinkBuilder());
            $main_editor->setAllowClear(true);
            $main_editor->setMinimumInputLength(0);
            $main_editor->SetAllowNullValue(false);
            $main_editor->SetHandlerName('filter_builder_lessons_cat_id_search');
            
            $multi_value_select_editor = new RemoteMultiValueSelect('cat_id', $this->CreateLinkBuilder());
            $multi_value_select_editor->SetHandlerName('filter_builder_lessons_cat_id_search');
            
            $filterBuilder->addColumn(
                $columns['cat_id'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IN => $multi_value_select_editor,
                    FilterConditionOperator::NOT_IN => $multi_value_select_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('id_edit');
            
            $filterBuilder->addColumn(
                $columns['id'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('lson_auth_edit');
            
            $filterBuilder->addColumn(
                $columns['lson_auth'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('lson_subject_edit');
            
            $filterBuilder->addColumn(
                $columns['lson_subject'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new DateTimeEdit('lson_date_edit', false, 'Y-m-d H:i:s');
            
            $filterBuilder->addColumn(
                $columns['lson_date'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::DATE_EQUALS => $main_editor,
                    FilterConditionOperator::DATE_DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::TODAY => null,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('lson_short_text_edit');
            
            $filterBuilder->addColumn(
                $columns['lson_short_text'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('lson_full_text');
            
            $filterBuilder->addColumn(
                $columns['lson_full_text'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('lson_details');
            
            $filterBuilder->addColumn(
                $columns['lson_details'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('lson_notes');
            
            $filterBuilder->addColumn(
                $columns['lson_notes'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('lson_icon');
            
            $filterBuilder->addColumn(
                $columns['lson_icon'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('lson_img1');
            
            $filterBuilder->addColumn(
                $columns['lson_img1'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('lson_img2');
            
            $filterBuilder->addColumn(
                $columns['lson_img2'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('lson_img3');
            
            $filterBuilder->addColumn(
                $columns['lson_img3'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('lson_link1_edit');
            
            $filterBuilder->addColumn(
                $columns['lson_link1'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('lson_link2_edit');
            
            $filterBuilder->addColumn(
                $columns['lson_link2'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('lson_link3_edit');
            
            $filterBuilder->addColumn(
                $columns['lson_link3'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('lson_video1');
            
            $filterBuilder->addColumn(
                $columns['lson_video1'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('lson_video2');
            
            $filterBuilder->addColumn(
                $columns['lson_video2'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('lson_video3');
            
            $filterBuilder->addColumn(
                $columns['lson_video3'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('lson_audio1');
            
            $filterBuilder->addColumn(
                $columns['lson_audio1'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('lson_audio2');
            
            $filterBuilder->addColumn(
                $columns['lson_audio2'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('lson_audio3');
            
            $filterBuilder->addColumn(
                $columns['lson_audio3'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('lson_youtube_video1');
            
            $filterBuilder->addColumn(
                $columns['lson_youtube_video1'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('lson_youtube_video2');
            
            $filterBuilder->addColumn(
                $columns['lson_youtube_video2'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('lson_youtube_video3');
            
            $filterBuilder->addColumn(
                $columns['lson_youtube_video3'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('lson_resource1');
            
            $filterBuilder->addColumn(
                $columns['lson_resource1'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('lson_resource2');
            
            $filterBuilder->addColumn(
                $columns['lson_resource2'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('lson_resource3');
            
            $filterBuilder->addColumn(
                $columns['lson_resource3'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::CONTAINS => $main_editor,
                    FilterConditionOperator::DOES_NOT_CONTAIN => $main_editor,
                    FilterConditionOperator::BEGINS_WITH => $main_editor,
                    FilterConditionOperator::ENDS_WITH => $main_editor,
                    FilterConditionOperator::IS_LIKE => $main_editor,
                    FilterConditionOperator::IS_NOT_LIKE => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new ComboBox('lson_status');
            $main_editor->SetAllowNullValue(false);
            $main_editor->addChoice(true, $this->GetLocalizerCaptions()->GetMessageString('True'));
            $main_editor->addChoice(false, $this->GetLocalizerCaptions()->GetMessageString('False'));
            
            $filterBuilder->addColumn(
                $columns['lson_status'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
            
            $main_editor = new TextEdit('user_id_edit');
            
            $filterBuilder->addColumn(
                $columns['user_id'],
                array(
                    FilterConditionOperator::EQUALS => $main_editor,
                    FilterConditionOperator::DOES_NOT_EQUAL => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN => $main_editor,
                    FilterConditionOperator::IS_GREATER_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN => $main_editor,
                    FilterConditionOperator::IS_LESS_THAN_OR_EQUAL_TO => $main_editor,
                    FilterConditionOperator::IS_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_NOT_BETWEEN => $main_editor,
                    FilterConditionOperator::IS_BLANK => null,
                    FilterConditionOperator::IS_NOT_BLANK => null
                )
            );
        }
    
        protected function AddOperationsColumns(Grid $grid)
        {
            $actions = $grid->getActions();
            $actions->setCaption($this->GetLocalizerCaptions()->GetMessageString('Actions'));
            $actions->setPosition(ActionList::POSITION_RIGHT);
            
            if ($this->GetSecurityInfo()->HasViewGrant())
            {
                $operation = new AjaxOperation(OPERATION_VIEW,
                    $this->GetLocalizerCaptions()->GetMessageString('View'),
                    $this->GetLocalizerCaptions()->GetMessageString('View'), $this->dataset,
                    $this->GetModalGridViewHandler(), $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
            
            if ($this->GetSecurityInfo()->HasEditGrant())
            {
                $operation = new AjaxOperation(OPERATION_EDIT,
                    $this->GetLocalizerCaptions()->GetMessageString('Edit'),
                    $this->GetLocalizerCaptions()->GetMessageString('Edit'), $this->dataset,
                    $this->GetGridEditHandler(), $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowEditButtonHandler', $this);
            }
            
            if ($this->GetSecurityInfo()->HasDeleteGrant())
            {
                $operation = new LinkOperation($this->GetLocalizerCaptions()->GetMessageString('Delete'), OPERATION_DELETE, $this->dataset, $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
                $operation->OnShow->AddListener('ShowDeleteButtonHandler', $this);
                $operation->SetAdditionalAttribute('data-modal-operation', 'delete');
                $operation->SetAdditionalAttribute('data-delete-handler-name', $this->GetModalGridDeleteHandler());
            }
            
            if ($this->GetSecurityInfo()->HasAddGrant())
            {
                $operation = new AjaxOperation(OPERATION_COPY,
                    $this->GetLocalizerCaptions()->GetMessageString('Copy'),
                    $this->GetLocalizerCaptions()->GetMessageString('Copy'), $this->dataset,
                    $this->GetModalGridCopyHandler(), $grid);
                $operation->setUseImage(true);
                $actions->addOperation($operation);
            }
        }
    
        protected function AddFieldColumns(Grid $grid, $withDetails = true)
        {
            //
            // View column for cat_name field
            //
            $column = new TextViewColumn('cat_id', 'cat_id_cat_name', 'القسم', $this->dataset);
            $column->SetOrderable(true);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for id field
            //
            $column = new NumberViewColumn('id', 'id', 'م', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for lson_auth field
            //
            $column = new TextViewColumn('lson_auth', 'lson_auth', 'الكاتب', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for lson_subject field
            //
            $column = new TextViewColumn('lson_subject', 'lson_subject', 'الموضوغ', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for lson_date field
            //
            $column = new DateTimeViewColumn('lson_date', 'lson_date', 'تاريخ الانشاء', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for lson_short_text field
            //
            $column = new TextViewColumn('lson_short_text', 'lson_short_text', 'الملخص', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for lson_icon field
            //
            $column = new ExternalImageViewColumn('lson_icon', 'lson_icon', 'الايقونة', $this->dataset);
            $column->SetOrderable(true);
            $column->setHeight('32');
            $column->setWidth('32');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for lson_img1 field
            //
            $column = new ExternalImageViewColumn('lson_img1', 'lson_img1', 'الصورة الأولى', $this->dataset);
            $column->SetOrderable(true);
            $column->setAlign('center');
            $column->setHeight('50');
            $column->setWidth('50');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for lson_link1 field
            //
            $column = new TextViewColumn('lson_link1', 'lson_link1', 'الرابط الأول', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for lson_video1 field
            //
            $column = new ExternalVideoViewColumn('lson_video1', 'lson_video1', 'الفيديو الأول', $this->dataset, '');
            $column->SetOrderable(true);
            $column->setAlign('center');
            $column->setVideoPlayerHeight('50');
            $column->setVideoPlayerWidth('50');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for lson_audio1 field
            //
            $column = new ExternalAudioViewColumn('lson_audio1', 'lson_audio1', 'الملف الصوتي الاول', $this->dataset, '');
            $column->SetOrderable(true);
            $column->setAlign('center');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for lson_youtube_video1 field
            //
            $column = new TextViewColumn('lson_youtube_video1', 'lson_youtube_video1', 'Youtube1st', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
            
            //
            // View column for lson_status field
            //
            $column = new CheckboxViewColumn('lson_status', 'lson_status', 'استعراض', $this->dataset);
            $column->SetOrderable(true);
            $column->setDisplayValues('<span class="pg-row-checkbox checked"></span>', '<span class="pg-row-checkbox"></span>');
            $column->setMinimalVisibility(ColumnVisibility::PHONE);
            $column->SetDescription('');
            $column->SetFixedWidth(null);
            $grid->AddViewColumn($column);
        }
    
        protected function AddSingleRecordViewColumns(Grid $grid)
        {
            //
            // View column for cat_name field
            //
            $column = new TextViewColumn('cat_id', 'cat_id_cat_name', 'القسم', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for id field
            //
            $column = new NumberViewColumn('id', 'id', 'م', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for lson_auth field
            //
            $column = new TextViewColumn('lson_auth', 'lson_auth', 'الكاتب', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for lson_subject field
            //
            $column = new TextViewColumn('lson_subject', 'lson_subject', 'الموضوغ', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for lson_date field
            //
            $column = new DateTimeViewColumn('lson_date', 'lson_date', 'تاريخ الانشاء', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for lson_short_text field
            //
            $column = new TextViewColumn('lson_short_text', 'lson_short_text', 'الملخص', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for lson_full_text field
            //
            $column = new TextViewColumn('lson_full_text', 'lson_full_text', 'النص', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(50);
            $column->SetReplaceLFByBR(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for lson_details field
            //
            $column = new TextViewColumn('lson_details', 'lson_details', 'التفاصيل', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(50);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for lson_notes field
            //
            $column = new TextViewColumn('lson_notes', 'lson_notes', 'الملاحظات', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(50);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for lson_icon field
            //
            $column = new ExternalImageViewColumn('lson_icon', 'lson_icon', 'الايقونة', $this->dataset);
            $column->SetOrderable(true);
            $column->setHeight('32');
            $column->setWidth('32');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for lson_img1 field
            //
            $column = new ExternalImageViewColumn('lson_img1', 'lson_img1', 'الصورة الأولى', $this->dataset);
            $column->SetOrderable(true);
            $column->setHeight('50');
            $column->setWidth('50');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for lson_img2 field
            //
            $column = new ExternalImageViewColumn('lson_img2', 'lson_img2', 'الصورة الثانية', $this->dataset);
            $column->SetOrderable(true);
            $column->setHeight('50');
            $column->setWidth('50');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for lson_img3 field
            //
            $column = new ExternalImageViewColumn('lson_img3', 'lson_img3', 'الصورة الثالثة', $this->dataset);
            $column->SetOrderable(true);
            $column->setHeight('50');
            $column->setWidth('50');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for lson_link1 field
            //
            $column = new TextViewColumn('lson_link1', 'lson_link1', 'الرابط الأول', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for lson_link2 field
            //
            $column = new TextViewColumn('lson_link2', 'lson_link2', 'الرابط الثاني', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for lson_link3 field
            //
            $column = new TextViewColumn('lson_link3', 'lson_link3', 'الرابط الثالث', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for lson_video1 field
            //
            $column = new ExternalVideoViewColumn('lson_video1', 'lson_video1', 'الفيديو الأول', $this->dataset, '');
            $column->SetOrderable(true);
            $column->setVideoPlayerHeight('50');
            $column->setVideoPlayerWidth('50');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for lson_video2 field
            //
            $column = new ExternalVideoViewColumn('lson_video2', 'lson_video2', 'الفيديو الثاني', $this->dataset, '');
            $column->SetOrderable(true);
            $column->setVideoPlayerHeight('50');
            $column->setVideoPlayerWidth('50');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for lson_video3 field
            //
            $column = new ExternalVideoViewColumn('lson_video3', 'lson_video3', 'الفيديو الثالث', $this->dataset, '');
            $column->SetOrderable(true);
            $column->setVideoPlayerHeight('50');
            $column->setVideoPlayerWidth('50');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for lson_audio1 field
            //
            $column = new ExternalAudioViewColumn('lson_audio1', 'lson_audio1', 'الملف الصوتي الاول', $this->dataset, '');
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for lson_audio2 field
            //
            $column = new ExternalAudioViewColumn('lson_audio2', 'lson_audio2', 'الملف ا لصوتي الثاني', $this->dataset, '');
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for lson_audio3 field
            //
            $column = new ExternalAudioViewColumn('lson_audio3', 'lson_audio3', 'الملف الصوتي الثالث', $this->dataset, '');
            $column->SetOrderable(true);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for lson_youtube_video1 field
            //
            $column = new TextViewColumn('lson_youtube_video1', 'lson_youtube_video1', 'Youtube1st', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for lson_youtube_video2 field
            //
            $column = new TextViewColumn('lson_youtube_video2', 'lson_youtube_video2', 'Youtube2nd', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for lson_youtube_video3 field
            //
            $column = new TextViewColumn('lson_youtube_video3', 'lson_youtube_video3', 'Youtube3rd', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for lson_resource1 field
            //
            $column = new TextViewColumn('lson_resource1', 'lson_resource1', 'المصدر الأول', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for lson_resource2 field
            //
            $column = new TextViewColumn('lson_resource2', 'lson_resource2', 'المصدر الثاني', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for lson_resource3 field
            //
            $column = new TextViewColumn('lson_resource3', 'lson_resource3', 'المصدر الثالث', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for lson_status field
            //
            $column = new CheckboxViewColumn('lson_status', 'lson_status', 'استعراض', $this->dataset);
            $column->SetOrderable(true);
            $column->setDisplayValues('<span class="pg-row-checkbox checked"></span>', '<span class="pg-row-checkbox"></span>');
            $grid->AddSingleRecordViewColumn($column);
            
            //
            // View column for user_id field
            //
            $column = new NumberViewColumn('user_id', 'user_id', 'المستخدم', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddSingleRecordViewColumn($column);
        }
    
        protected function AddEditColumns(Grid $grid)
        {
            //
            // Edit column for cat_id field
            //
            $editor = new DynamicCombobox('cat_id_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MySqlIConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`categories`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('id', true, true, true),
                    new StringField('cat_name', true),
                    new StringField('cat_desc'),
                    new StringField('cat_img'),
                    new IntegerField('cat_status'),
                    new DateTimeField('cat_created'),
                    new IntegerField('user_id')
                )
            );
            $lookupDataset->setOrderByField('cat_name', 'ASC');
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), 'cat_status=1'));
            $editColumn = new DynamicLookupEditColumn('القسم', 'cat_id', 'cat_id_cat_name', 'edit_lessons_cat_id_search', $editor, $this->dataset, $lookupDataset, 'id', 'cat_name', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for lson_auth field
            //
            $editor = new TextEdit('lson_auth_edit');
            $editColumn = new CustomEditColumn('الكاتب', 'lson_auth', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for lson_subject field
            //
            $editor = new TextEdit('lson_subject_edit');
            $editColumn = new CustomEditColumn('الموضوغ', 'lson_subject', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for lson_date field
            //
            $editor = new DateTimeEdit('lson_date_edit', false, 'Y-m-d H:i:s');
            $editColumn = new CustomEditColumn('تاريخ الانشاء', 'lson_date', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for lson_short_text field
            //
            $editor = new TextEdit('lson_short_text_edit');
            $editColumn = new CustomEditColumn('الملخص', 'lson_short_text', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for lson_full_text field
            //
            $editor = new HtmlWysiwygEditor('lson_full_text_edit');
            $editColumn = new CustomEditColumn('النص', 'lson_full_text', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for lson_details field
            //
            $editor = new HtmlWysiwygEditor('lson_details_edit');
            $editColumn = new CustomEditColumn('التفاصيل', 'lson_details', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for lson_notes field
            //
            $editor = new HtmlWysiwygEditor('lson_notes_edit');
            $editColumn = new CustomEditColumn('الملاحظات', 'lson_notes', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for lson_icon field
            //
            $editor = new ImageUploader('lson_icon_edit');
            $editor->SetShowImage(true);
            $editor->setAcceptableFileTypes('image/*');
            $editColumn = new UploadFileToFolderColumn('الايقونة', 'lson_icon', $editor, $this->dataset, false, false, 'images/img/', '%random%.%original_file_extension%', $this->OnFileUpload, false);
            $editColumn->SetReplaceUploadedFileIfExist(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for lson_img1 field
            //
            $editor = new ImageUploader('lson_img1_edit');
            $editor->SetShowImage(true);
            $editor->setAcceptableFileTypes('image/*');
            $editColumn = new UploadFileToFolderColumn('الصورة الأولى', 'lson_img1', $editor, $this->dataset, false, false, 'images/img/', '%random%.%original_file_extension%', $this->OnFileUpload, false);
            $editColumn->SetReplaceUploadedFileIfExist(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for lson_img2 field
            //
            $editor = new ImageUploader('lson_img2_edit');
            $editor->SetShowImage(true);
            $editor->setAcceptableFileTypes('image/*');
            $editColumn = new UploadFileToFolderColumn('الصورة الثانية', 'lson_img2', $editor, $this->dataset, false, false, 'images/img/', '%random%.%original_file_extension%', $this->OnFileUpload, false);
            $editColumn->SetReplaceUploadedFileIfExist(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for lson_img3 field
            //
            $editor = new ImageUploader('lson_img3_edit');
            $editor->SetShowImage(true);
            $editor->setAcceptableFileTypes('image/*');
            $editColumn = new UploadFileToFolderColumn('الصورة الثالثة', 'lson_img3', $editor, $this->dataset, false, false, 'images/img/', '%random%.%original_file_extension%', $this->OnFileUpload, false);
            $editColumn->SetReplaceUploadedFileIfExist(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for lson_link1 field
            //
            $editor = new TextEdit('lson_link1_edit');
            $editColumn = new CustomEditColumn('الرابط الأول', 'lson_link1', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for lson_link2 field
            //
            $editor = new TextEdit('lson_link2_edit');
            $editColumn = new CustomEditColumn('الرابط الثاني', 'lson_link2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for lson_link3 field
            //
            $editor = new TextEdit('lson_link3_edit');
            $editColumn = new CustomEditColumn('الرابط الثالث', 'lson_link3', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for lson_video1 field
            //
            $editor = new ImageUploader('lson_video1_edit');
            $editor->SetShowImage(false);
            $editColumn = new UploadFileToFolderColumn('الفيديو الأول', 'lson_video1', $editor, $this->dataset, false, false, 'images/video/', '%random%.%original_file_extension%', $this->OnFileUpload, false);
            $editColumn->SetReplaceUploadedFileIfExist(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for lson_video2 field
            //
            $editor = new ImageUploader('lson_video2_edit');
            $editor->SetShowImage(false);
            $editColumn = new UploadFileToFolderColumn('الفيديو الثاني', 'lson_video2', $editor, $this->dataset, false, false, 'images/video/', '%random%.%original_file_extension%', $this->OnFileUpload, false);
            $editColumn->SetReplaceUploadedFileIfExist(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for lson_video3 field
            //
            $editor = new ImageUploader('lson_video3_edit');
            $editor->SetShowImage(false);
            $editColumn = new UploadFileToFolderColumn('الفيديو الثالث', 'lson_video3', $editor, $this->dataset, false, false, 'images/video/', '%random%.%original_file_extension%', $this->OnFileUpload, false);
            $editColumn->SetReplaceUploadedFileIfExist(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for lson_audio1 field
            //
            $editor = new ImageUploader('lson_audio1_edit');
            $editor->SetShowImage(false);
            $editColumn = new UploadFileToFolderColumn('الملف الصوتي الاول', 'lson_audio1', $editor, $this->dataset, false, false, 'images/audio/', '%random%.%original_file_extension%', $this->OnFileUpload, false);
            $editColumn->SetReplaceUploadedFileIfExist(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for lson_audio2 field
            //
            $editor = new ImageUploader('lson_audio2_edit');
            $editor->SetShowImage(false);
            $editColumn = new UploadFileToFolderColumn('الملف ا لصوتي الثاني', 'lson_audio2', $editor, $this->dataset, false, false, 'images/audio/', '%random%.%original_file_extension%', $this->OnFileUpload, false);
            $editColumn->SetReplaceUploadedFileIfExist(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for lson_audio3 field
            //
            $editor = new ImageUploader('lson_audio3_edit');
            $editor->SetShowImage(false);
            $editColumn = new UploadFileToFolderColumn('الملف الصوتي الثالث', 'lson_audio3', $editor, $this->dataset, false, false, 'images/audio/', '%random%.%original_file_extension%', $this->OnFileUpload, false);
            $editColumn->SetReplaceUploadedFileIfExist(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for lson_youtube_video1 field
            //
            $editor = new HtmlWysiwygEditor('lson_youtube_video1_edit');
            $editColumn = new CustomEditColumn('Youtube1st', 'lson_youtube_video1', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for lson_youtube_video2 field
            //
            $editor = new TextAreaEdit('lson_youtube_video2_edit', 50, 8);
            $editColumn = new CustomEditColumn('Youtube2nd', 'lson_youtube_video2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for lson_youtube_video3 field
            //
            $editor = new TextAreaEdit('lson_youtube_video3_edit', 50, 8);
            $editColumn = new CustomEditColumn('Youtube3rd', 'lson_youtube_video3', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for lson_resource1 field
            //
            $editor = new TextAreaEdit('lson_resource1_edit', 50, 5);
            $editColumn = new CustomEditColumn('المصدر الأول', 'lson_resource1', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for lson_resource2 field
            //
            $editor = new TextAreaEdit('lson_resource2_edit', 50, 5);
            $editColumn = new CustomEditColumn('المصدر الثاني', 'lson_resource2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for lson_resource3 field
            //
            $editor = new TextAreaEdit('lson_resource3_edit', 50, 5);
            $editColumn = new CustomEditColumn('المصدر الثالث', 'lson_resource3', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for lson_status field
            //
            $editor = new CheckBox('lson_status_edit');
            $editColumn = new CustomEditColumn('استعراض', 'lson_status', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
            
            //
            // Edit column for user_id field
            //
            $editor = new TextEdit('user_id_edit');
            $editColumn = new CustomEditColumn('المستخدم', 'user_id', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddEditColumn($editColumn);
        }
    
        protected function AddMultiEditColumns(Grid $grid)
        {
            //
            // Edit column for cat_id field
            //
            $editor = new DynamicCombobox('cat_id_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MySqlIConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`categories`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('id', true, true, true),
                    new StringField('cat_name', true),
                    new StringField('cat_desc'),
                    new StringField('cat_img'),
                    new IntegerField('cat_status'),
                    new DateTimeField('cat_created'),
                    new IntegerField('user_id')
                )
            );
            $lookupDataset->setOrderByField('cat_name', 'ASC');
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), 'cat_status=1'));
            $editColumn = new DynamicLookupEditColumn('القسم', 'cat_id', 'cat_id_cat_name', 'multi_edit_lessons_cat_id_search', $editor, $this->dataset, $lookupDataset, 'id', 'cat_name', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for lson_auth field
            //
            $editor = new TextEdit('lson_auth_edit');
            $editColumn = new CustomEditColumn('الكاتب', 'lson_auth', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for lson_subject field
            //
            $editor = new TextEdit('lson_subject_edit');
            $editColumn = new CustomEditColumn('الموضوغ', 'lson_subject', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for lson_date field
            //
            $editor = new DateTimeEdit('lson_date_edit', false, 'Y-m-d H:i:s');
            $editColumn = new CustomEditColumn('تاريخ الانشاء', 'lson_date', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for lson_short_text field
            //
            $editor = new TextEdit('lson_short_text_edit');
            $editColumn = new CustomEditColumn('الملخص', 'lson_short_text', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for lson_full_text field
            //
            $editor = new HtmlWysiwygEditor('lson_full_text_edit');
            $editColumn = new CustomEditColumn('النص', 'lson_full_text', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for lson_details field
            //
            $editor = new HtmlWysiwygEditor('lson_details_edit');
            $editColumn = new CustomEditColumn('التفاصيل', 'lson_details', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for lson_notes field
            //
            $editor = new HtmlWysiwygEditor('lson_notes_edit');
            $editColumn = new CustomEditColumn('الملاحظات', 'lson_notes', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for lson_icon field
            //
            $editor = new ImageUploader('lson_icon_edit');
            $editor->SetShowImage(true);
            $editor->setAcceptableFileTypes('image/*');
            $editColumn = new UploadFileToFolderColumn('الايقونة', 'lson_icon', $editor, $this->dataset, false, false, 'images/img/', '%random%.%original_file_extension%', $this->OnFileUpload, false);
            $editColumn->SetReplaceUploadedFileIfExist(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for lson_img1 field
            //
            $editor = new ImageUploader('lson_img1_edit');
            $editor->SetShowImage(true);
            $editor->setAcceptableFileTypes('image/*');
            $editColumn = new UploadFileToFolderColumn('الصورة الأولى', 'lson_img1', $editor, $this->dataset, false, false, 'images/img/', '%random%.%original_file_extension%', $this->OnFileUpload, false);
            $editColumn->SetReplaceUploadedFileIfExist(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for lson_img2 field
            //
            $editor = new ImageUploader('lson_img2_edit');
            $editor->SetShowImage(true);
            $editor->setAcceptableFileTypes('image/*');
            $editColumn = new UploadFileToFolderColumn('الصورة الثانية', 'lson_img2', $editor, $this->dataset, false, false, 'images/img/', '%random%.%original_file_extension%', $this->OnFileUpload, false);
            $editColumn->SetReplaceUploadedFileIfExist(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for lson_img3 field
            //
            $editor = new ImageUploader('lson_img3_edit');
            $editor->SetShowImage(true);
            $editor->setAcceptableFileTypes('image/*');
            $editColumn = new UploadFileToFolderColumn('الصورة الثالثة', 'lson_img3', $editor, $this->dataset, false, false, 'images/img/', '%random%.%original_file_extension%', $this->OnFileUpload, false);
            $editColumn->SetReplaceUploadedFileIfExist(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for lson_link1 field
            //
            $editor = new TextEdit('lson_link1_edit');
            $editColumn = new CustomEditColumn('الرابط الأول', 'lson_link1', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for lson_link2 field
            //
            $editor = new TextEdit('lson_link2_edit');
            $editColumn = new CustomEditColumn('الرابط الثاني', 'lson_link2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for lson_link3 field
            //
            $editor = new TextEdit('lson_link3_edit');
            $editColumn = new CustomEditColumn('الرابط الثالث', 'lson_link3', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for lson_video1 field
            //
            $editor = new ImageUploader('lson_video1_edit');
            $editor->SetShowImage(false);
            $editColumn = new UploadFileToFolderColumn('الفيديو الأول', 'lson_video1', $editor, $this->dataset, false, false, 'images/video/', '%random%.%original_file_extension%', $this->OnFileUpload, false);
            $editColumn->SetReplaceUploadedFileIfExist(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for lson_video2 field
            //
            $editor = new ImageUploader('lson_video2_edit');
            $editor->SetShowImage(false);
            $editColumn = new UploadFileToFolderColumn('الفيديو الثاني', 'lson_video2', $editor, $this->dataset, false, false, 'images/video/', '%random%.%original_file_extension%', $this->OnFileUpload, false);
            $editColumn->SetReplaceUploadedFileIfExist(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for lson_video3 field
            //
            $editor = new ImageUploader('lson_video3_edit');
            $editor->SetShowImage(false);
            $editColumn = new UploadFileToFolderColumn('الفيديو الثالث', 'lson_video3', $editor, $this->dataset, false, false, 'images/video/', '%random%.%original_file_extension%', $this->OnFileUpload, false);
            $editColumn->SetReplaceUploadedFileIfExist(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for lson_audio1 field
            //
            $editor = new ImageUploader('lson_audio1_edit');
            $editor->SetShowImage(false);
            $editColumn = new UploadFileToFolderColumn('الملف الصوتي الاول', 'lson_audio1', $editor, $this->dataset, false, false, 'images/audio/', '%random%.%original_file_extension%', $this->OnFileUpload, false);
            $editColumn->SetReplaceUploadedFileIfExist(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for lson_audio2 field
            //
            $editor = new ImageUploader('lson_audio2_edit');
            $editor->SetShowImage(false);
            $editColumn = new UploadFileToFolderColumn('الملف ا لصوتي الثاني', 'lson_audio2', $editor, $this->dataset, false, false, 'images/audio/', '%random%.%original_file_extension%', $this->OnFileUpload, false);
            $editColumn->SetReplaceUploadedFileIfExist(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for lson_audio3 field
            //
            $editor = new ImageUploader('lson_audio3_edit');
            $editor->SetShowImage(false);
            $editColumn = new UploadFileToFolderColumn('الملف الصوتي الثالث', 'lson_audio3', $editor, $this->dataset, false, false, 'images/audio/', '%random%.%original_file_extension%', $this->OnFileUpload, false);
            $editColumn->SetReplaceUploadedFileIfExist(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for lson_youtube_video1 field
            //
            $editor = new HtmlWysiwygEditor('lson_youtube_video1_edit');
            $editColumn = new CustomEditColumn('Youtube1st', 'lson_youtube_video1', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for lson_youtube_video2 field
            //
            $editor = new TextAreaEdit('lson_youtube_video2_edit', 50, 8);
            $editColumn = new CustomEditColumn('Youtube2nd', 'lson_youtube_video2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for lson_youtube_video3 field
            //
            $editor = new TextAreaEdit('lson_youtube_video3_edit', 50, 8);
            $editColumn = new CustomEditColumn('Youtube3rd', 'lson_youtube_video3', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for lson_resource1 field
            //
            $editor = new TextAreaEdit('lson_resource1_edit', 50, 5);
            $editColumn = new CustomEditColumn('المصدر الأول', 'lson_resource1', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for lson_resource2 field
            //
            $editor = new TextAreaEdit('lson_resource2_edit', 50, 5);
            $editColumn = new CustomEditColumn('المصدر الثاني', 'lson_resource2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for lson_resource3 field
            //
            $editor = new TextAreaEdit('lson_resource3_edit', 50, 5);
            $editColumn = new CustomEditColumn('المصدر الثالث', 'lson_resource3', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for lson_status field
            //
            $editor = new CheckBox('lson_status_edit');
            $editColumn = new CustomEditColumn('استعراض', 'lson_status', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
            
            //
            // Edit column for user_id field
            //
            $editor = new TextEdit('user_id_edit');
            $editColumn = new CustomEditColumn('المستخدم', 'user_id', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddMultiEditColumn($editColumn);
        }
    
        protected function AddInsertColumns(Grid $grid)
        {
            //
            // Edit column for cat_id field
            //
            $editor = new DynamicCombobox('cat_id_edit', $this->CreateLinkBuilder());
            $editor->setAllowClear(true);
            $editor->setMinimumInputLength(0);
            $lookupDataset = new TableDataset(
                MySqlIConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`categories`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('id', true, true, true),
                    new StringField('cat_name', true),
                    new StringField('cat_desc'),
                    new StringField('cat_img'),
                    new IntegerField('cat_status'),
                    new DateTimeField('cat_created'),
                    new IntegerField('user_id')
                )
            );
            $lookupDataset->setOrderByField('cat_name', 'ASC');
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), 'cat_status=1'));
            $editColumn = new DynamicLookupEditColumn('القسم', 'cat_id', 'cat_id_cat_name', 'insert_lessons_cat_id_search', $editor, $this->dataset, $lookupDataset, 'id', 'cat_name', '');
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for lson_auth field
            //
            $editor = new TextEdit('lson_auth_edit');
            $editColumn = new CustomEditColumn('الكاتب', 'lson_auth', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for lson_subject field
            //
            $editor = new TextEdit('lson_subject_edit');
            $editColumn = new CustomEditColumn('الموضوغ', 'lson_subject', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for lson_date field
            //
            $editor = new DateTimeEdit('lson_date_edit', false, 'Y-m-d H:i:s');
            $editColumn = new CustomEditColumn('تاريخ الانشاء', 'lson_date', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for lson_short_text field
            //
            $editor = new TextEdit('lson_short_text_edit');
            $editColumn = new CustomEditColumn('الملخص', 'lson_short_text', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for lson_full_text field
            //
            $editor = new HtmlWysiwygEditor('lson_full_text_edit');
            $editColumn = new CustomEditColumn('النص', 'lson_full_text', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for lson_details field
            //
            $editor = new HtmlWysiwygEditor('lson_details_edit');
            $editColumn = new CustomEditColumn('التفاصيل', 'lson_details', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for lson_notes field
            //
            $editor = new HtmlWysiwygEditor('lson_notes_edit');
            $editColumn = new CustomEditColumn('الملاحظات', 'lson_notes', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for lson_icon field
            //
            $editor = new ImageUploader('lson_icon_edit');
            $editor->SetShowImage(true);
            $editor->setAcceptableFileTypes('image/*');
            $editColumn = new UploadFileToFolderColumn('الايقونة', 'lson_icon', $editor, $this->dataset, false, false, 'images/img/', '%random%.%original_file_extension%', $this->OnFileUpload, false);
            $editColumn->SetReplaceUploadedFileIfExist(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for lson_img1 field
            //
            $editor = new ImageUploader('lson_img1_edit');
            $editor->SetShowImage(true);
            $editor->setAcceptableFileTypes('image/*');
            $editColumn = new UploadFileToFolderColumn('الصورة الأولى', 'lson_img1', $editor, $this->dataset, false, false, 'images/img/', '%random%.%original_file_extension%', $this->OnFileUpload, false);
            $editColumn->SetReplaceUploadedFileIfExist(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for lson_img2 field
            //
            $editor = new ImageUploader('lson_img2_edit');
            $editor->SetShowImage(true);
            $editor->setAcceptableFileTypes('image/*');
            $editColumn = new UploadFileToFolderColumn('الصورة الثانية', 'lson_img2', $editor, $this->dataset, false, false, 'images/img/', '%random%.%original_file_extension%', $this->OnFileUpload, false);
            $editColumn->SetReplaceUploadedFileIfExist(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for lson_img3 field
            //
            $editor = new ImageUploader('lson_img3_edit');
            $editor->SetShowImage(true);
            $editor->setAcceptableFileTypes('image/*');
            $editColumn = new UploadFileToFolderColumn('الصورة الثالثة', 'lson_img3', $editor, $this->dataset, false, false, 'images/img/', '%random%.%original_file_extension%', $this->OnFileUpload, false);
            $editColumn->SetReplaceUploadedFileIfExist(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for lson_link1 field
            //
            $editor = new TextEdit('lson_link1_edit');
            $editColumn = new CustomEditColumn('الرابط الأول', 'lson_link1', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for lson_link2 field
            //
            $editor = new TextEdit('lson_link2_edit');
            $editColumn = new CustomEditColumn('الرابط الثاني', 'lson_link2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for lson_link3 field
            //
            $editor = new TextEdit('lson_link3_edit');
            $editColumn = new CustomEditColumn('الرابط الثالث', 'lson_link3', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for lson_video1 field
            //
            $editor = new ImageUploader('lson_video1_edit');
            $editor->SetShowImage(false);
            $editColumn = new UploadFileToFolderColumn('الفيديو الأول', 'lson_video1', $editor, $this->dataset, false, false, 'images/video/', '%random%.%original_file_extension%', $this->OnFileUpload, false);
            $editColumn->SetReplaceUploadedFileIfExist(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for lson_video2 field
            //
            $editor = new ImageUploader('lson_video2_edit');
            $editor->SetShowImage(false);
            $editColumn = new UploadFileToFolderColumn('الفيديو الثاني', 'lson_video2', $editor, $this->dataset, false, false, 'images/video/', '%random%.%original_file_extension%', $this->OnFileUpload, false);
            $editColumn->SetReplaceUploadedFileIfExist(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for lson_video3 field
            //
            $editor = new ImageUploader('lson_video3_edit');
            $editor->SetShowImage(false);
            $editColumn = new UploadFileToFolderColumn('الفيديو الثالث', 'lson_video3', $editor, $this->dataset, false, false, 'images/video/', '%random%.%original_file_extension%', $this->OnFileUpload, false);
            $editColumn->SetReplaceUploadedFileIfExist(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for lson_audio1 field
            //
            $editor = new ImageUploader('lson_audio1_edit');
            $editor->SetShowImage(false);
            $editColumn = new UploadFileToFolderColumn('الملف الصوتي الاول', 'lson_audio1', $editor, $this->dataset, false, false, 'images/audio/', '%random%.%original_file_extension%', $this->OnFileUpload, false);
            $editColumn->SetReplaceUploadedFileIfExist(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for lson_audio2 field
            //
            $editor = new ImageUploader('lson_audio2_edit');
            $editor->SetShowImage(false);
            $editColumn = new UploadFileToFolderColumn('الملف ا لصوتي الثاني', 'lson_audio2', $editor, $this->dataset, false, false, 'images/audio/', '%random%.%original_file_extension%', $this->OnFileUpload, false);
            $editColumn->SetReplaceUploadedFileIfExist(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for lson_audio3 field
            //
            $editor = new ImageUploader('lson_audio3_edit');
            $editor->SetShowImage(false);
            $editColumn = new UploadFileToFolderColumn('الملف الصوتي الثالث', 'lson_audio3', $editor, $this->dataset, false, false, 'images/audio/', '%random%.%original_file_extension%', $this->OnFileUpload, false);
            $editColumn->SetReplaceUploadedFileIfExist(true);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for lson_youtube_video1 field
            //
            $editor = new HtmlWysiwygEditor('lson_youtube_video1_edit');
            $editColumn = new CustomEditColumn('Youtube1st', 'lson_youtube_video1', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for lson_youtube_video2 field
            //
            $editor = new TextAreaEdit('lson_youtube_video2_edit', 50, 8);
            $editColumn = new CustomEditColumn('Youtube2nd', 'lson_youtube_video2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for lson_youtube_video3 field
            //
            $editor = new TextAreaEdit('lson_youtube_video3_edit', 50, 8);
            $editColumn = new CustomEditColumn('Youtube3rd', 'lson_youtube_video3', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for lson_resource1 field
            //
            $editor = new TextAreaEdit('lson_resource1_edit', 50, 5);
            $editColumn = new CustomEditColumn('المصدر الأول', 'lson_resource1', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for lson_resource2 field
            //
            $editor = new TextAreaEdit('lson_resource2_edit', 50, 5);
            $editColumn = new CustomEditColumn('المصدر الثاني', 'lson_resource2', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for lson_resource3 field
            //
            $editor = new TextAreaEdit('lson_resource3_edit', 50, 5);
            $editColumn = new CustomEditColumn('المصدر الثالث', 'lson_resource3', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for lson_status field
            //
            $editor = new CheckBox('lson_status_edit');
            $editColumn = new CustomEditColumn('استعراض', 'lson_status', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $editColumn->SetInsertDefaultValue('1');
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            
            //
            // Edit column for user_id field
            //
            $editor = new TextEdit('user_id_edit');
            $editColumn = new CustomEditColumn('المستخدم', 'user_id', $editor, $this->dataset);
            $editColumn->SetAllowSetToNull(true);
            $editColumn->SetInsertDefaultValue('1');
            $this->ApplyCommonColumnEditProperties($editColumn);
            $grid->AddInsertColumn($editColumn);
            $grid->SetShowAddButton(true && $this->GetSecurityInfo()->HasAddGrant());
        }
    
        private function AddMultiUploadColumn(Grid $grid)
        {
    
        }
    
        protected function AddPrintColumns(Grid $grid)
        {
            //
            // View column for cat_name field
            //
            $column = new TextViewColumn('cat_id', 'cat_id_cat_name', 'القسم', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for id field
            //
            $column = new NumberViewColumn('id', 'id', 'م', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
            
            //
            // View column for lson_auth field
            //
            $column = new TextViewColumn('lson_auth', 'lson_auth', 'الكاتب', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddPrintColumn($column);
            
            //
            // View column for lson_subject field
            //
            $column = new TextViewColumn('lson_subject', 'lson_subject', 'الموضوغ', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddPrintColumn($column);
            
            //
            // View column for lson_date field
            //
            $column = new DateTimeViewColumn('lson_date', 'lson_date', 'تاريخ الانشاء', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $grid->AddPrintColumn($column);
            
            //
            // View column for lson_short_text field
            //
            $column = new TextViewColumn('lson_short_text', 'lson_short_text', 'الملخص', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddPrintColumn($column);
            
            //
            // View column for lson_full_text field
            //
            $column = new TextViewColumn('lson_full_text', 'lson_full_text', 'النص', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(50);
            $column->SetReplaceLFByBR(true);
            $grid->AddPrintColumn($column);
            
            //
            // View column for lson_details field
            //
            $column = new TextViewColumn('lson_details', 'lson_details', 'التفاصيل', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(50);
            $grid->AddPrintColumn($column);
            
            //
            // View column for lson_notes field
            //
            $column = new TextViewColumn('lson_notes', 'lson_notes', 'الملاحظات', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(50);
            $grid->AddPrintColumn($column);
            
            //
            // View column for lson_icon field
            //
            $column = new ExternalImageViewColumn('lson_icon', 'lson_icon', 'الايقونة', $this->dataset);
            $column->SetOrderable(true);
            $column->setHeight('32');
            $column->setWidth('32');
            $grid->AddPrintColumn($column);
            
            //
            // View column for lson_img1 field
            //
            $column = new ExternalImageViewColumn('lson_img1', 'lson_img1', 'الصورة الأولى', $this->dataset);
            $column->SetOrderable(true);
            $column->setAlign('center');
            $column->setHeight('50');
            $column->setWidth('50');
            $grid->AddPrintColumn($column);
            
            //
            // View column for lson_img2 field
            //
            $column = new ExternalImageViewColumn('lson_img2', 'lson_img2', 'الصورة الثانية', $this->dataset);
            $column->SetOrderable(true);
            $column->setAlign('center');
            $column->setHeight('50');
            $column->setWidth('50');
            $grid->AddPrintColumn($column);
            
            //
            // View column for lson_img3 field
            //
            $column = new ExternalImageViewColumn('lson_img3', 'lson_img3', 'الصورة الثالثة', $this->dataset);
            $column->SetOrderable(true);
            $column->setAlign('center');
            $column->setHeight('50');
            $column->setWidth('50');
            $grid->AddPrintColumn($column);
            
            //
            // View column for lson_link1 field
            //
            $column = new TextViewColumn('lson_link1', 'lson_link1', 'الرابط الأول', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddPrintColumn($column);
            
            //
            // View column for lson_link2 field
            //
            $column = new TextViewColumn('lson_link2', 'lson_link2', 'الرابط الثاني', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddPrintColumn($column);
            
            //
            // View column for lson_link3 field
            //
            $column = new TextViewColumn('lson_link3', 'lson_link3', 'الرابط الثالث', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddPrintColumn($column);
            
            //
            // View column for lson_video1 field
            //
            $column = new ExternalVideoViewColumn('lson_video1', 'lson_video1', 'الفيديو الأول', $this->dataset, '');
            $column->SetOrderable(true);
            $column->setAlign('center');
            $column->setVideoPlayerHeight('50');
            $column->setVideoPlayerWidth('50');
            $grid->AddPrintColumn($column);
            
            //
            // View column for lson_video2 field
            //
            $column = new ExternalVideoViewColumn('lson_video2', 'lson_video2', 'الفيديو الثاني', $this->dataset, '');
            $column->SetOrderable(true);
            $column->setAlign('center');
            $column->setVideoPlayerHeight('50');
            $column->setVideoPlayerWidth('50');
            $grid->AddPrintColumn($column);
            
            //
            // View column for lson_video3 field
            //
            $column = new ExternalVideoViewColumn('lson_video3', 'lson_video3', 'الفيديو الثالث', $this->dataset, '');
            $column->SetOrderable(true);
            $column->setAlign('center');
            $column->setVideoPlayerHeight('50');
            $column->setVideoPlayerWidth('50');
            $grid->AddPrintColumn($column);
            
            //
            // View column for lson_audio1 field
            //
            $column = new ExternalAudioViewColumn('lson_audio1', 'lson_audio1', 'الملف الصوتي الاول', $this->dataset, '');
            $column->SetOrderable(true);
            $column->setAlign('center');
            $grid->AddPrintColumn($column);
            
            //
            // View column for lson_audio2 field
            //
            $column = new ExternalAudioViewColumn('lson_audio2', 'lson_audio2', 'الملف ا لصوتي الثاني', $this->dataset, '');
            $column->SetOrderable(true);
            $column->setAlign('center');
            $grid->AddPrintColumn($column);
            
            //
            // View column for lson_audio3 field
            //
            $column = new ExternalAudioViewColumn('lson_audio3', 'lson_audio3', 'الملف الصوتي الثالث', $this->dataset, '');
            $column->SetOrderable(true);
            $column->setAlign('center');
            $grid->AddPrintColumn($column);
            
            //
            // View column for lson_youtube_video1 field
            //
            $column = new TextViewColumn('lson_youtube_video1', 'lson_youtube_video1', 'Youtube1st', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddPrintColumn($column);
            
            //
            // View column for lson_youtube_video2 field
            //
            $column = new TextViewColumn('lson_youtube_video2', 'lson_youtube_video2', 'Youtube2nd', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddPrintColumn($column);
            
            //
            // View column for lson_youtube_video3 field
            //
            $column = new TextViewColumn('lson_youtube_video3', 'lson_youtube_video3', 'Youtube3rd', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddPrintColumn($column);
            
            //
            // View column for lson_resource1 field
            //
            $column = new TextViewColumn('lson_resource1', 'lson_resource1', 'المصدر الأول', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddPrintColumn($column);
            
            //
            // View column for lson_resource2 field
            //
            $column = new TextViewColumn('lson_resource2', 'lson_resource2', 'المصدر الثاني', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddPrintColumn($column);
            
            //
            // View column for lson_resource3 field
            //
            $column = new TextViewColumn('lson_resource3', 'lson_resource3', 'المصدر الثالث', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddPrintColumn($column);
            
            //
            // View column for lson_status field
            //
            $column = new CheckboxViewColumn('lson_status', 'lson_status', 'استعراض', $this->dataset);
            $column->SetOrderable(true);
            $column->setDisplayValues('<span class="pg-row-checkbox checked"></span>', '<span class="pg-row-checkbox"></span>');
            $grid->AddPrintColumn($column);
            
            //
            // View column for user_id field
            //
            $column = new NumberViewColumn('user_id', 'user_id', 'المستخدم', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddPrintColumn($column);
        }
    
        protected function AddExportColumns(Grid $grid)
        {
            //
            // View column for cat_name field
            //
            $column = new TextViewColumn('cat_id', 'cat_id_cat_name', 'القسم', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for id field
            //
            $column = new NumberViewColumn('id', 'id', 'م', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
            
            //
            // View column for lson_auth field
            //
            $column = new TextViewColumn('lson_auth', 'lson_auth', 'الكاتب', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddExportColumn($column);
            
            //
            // View column for lson_subject field
            //
            $column = new TextViewColumn('lson_subject', 'lson_subject', 'الموضوغ', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddExportColumn($column);
            
            //
            // View column for lson_date field
            //
            $column = new DateTimeViewColumn('lson_date', 'lson_date', 'تاريخ الانشاء', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $grid->AddExportColumn($column);
            
            //
            // View column for lson_short_text field
            //
            $column = new TextViewColumn('lson_short_text', 'lson_short_text', 'الملخص', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddExportColumn($column);
            
            //
            // View column for lson_full_text field
            //
            $column = new TextViewColumn('lson_full_text', 'lson_full_text', 'النص', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(50);
            $column->SetReplaceLFByBR(true);
            $grid->AddExportColumn($column);
            
            //
            // View column for lson_details field
            //
            $column = new TextViewColumn('lson_details', 'lson_details', 'التفاصيل', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(50);
            $grid->AddExportColumn($column);
            
            //
            // View column for lson_notes field
            //
            $column = new TextViewColumn('lson_notes', 'lson_notes', 'الملاحظات', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(50);
            $grid->AddExportColumn($column);
            
            //
            // View column for lson_icon field
            //
            $column = new ExternalImageViewColumn('lson_icon', 'lson_icon', 'الايقونة', $this->dataset);
            $column->SetOrderable(true);
            $column->setHeight('32');
            $column->setWidth('32');
            $grid->AddExportColumn($column);
            
            //
            // View column for lson_img1 field
            //
            $column = new ExternalImageViewColumn('lson_img1', 'lson_img1', 'الصورة الأولى', $this->dataset);
            $column->SetOrderable(true);
            $column->setAlign('center');
            $column->setHeight('50');
            $column->setWidth('50');
            $grid->AddExportColumn($column);
            
            //
            // View column for lson_img2 field
            //
            $column = new ExternalImageViewColumn('lson_img2', 'lson_img2', 'الصورة الثانية', $this->dataset);
            $column->SetOrderable(true);
            $column->setAlign('center');
            $column->setHeight('50');
            $column->setWidth('50');
            $grid->AddExportColumn($column);
            
            //
            // View column for lson_img3 field
            //
            $column = new ExternalImageViewColumn('lson_img3', 'lson_img3', 'الصورة الثالثة', $this->dataset);
            $column->SetOrderable(true);
            $column->setAlign('center');
            $column->setHeight('50');
            $column->setWidth('50');
            $grid->AddExportColumn($column);
            
            //
            // View column for lson_link1 field
            //
            $column = new TextViewColumn('lson_link1', 'lson_link1', 'الرابط الأول', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddExportColumn($column);
            
            //
            // View column for lson_link2 field
            //
            $column = new TextViewColumn('lson_link2', 'lson_link2', 'الرابط الثاني', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddExportColumn($column);
            
            //
            // View column for lson_link3 field
            //
            $column = new TextViewColumn('lson_link3', 'lson_link3', 'الرابط الثالث', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddExportColumn($column);
            
            //
            // View column for lson_video1 field
            //
            $column = new ExternalVideoViewColumn('lson_video1', 'lson_video1', 'الفيديو الأول', $this->dataset, '');
            $column->SetOrderable(true);
            $column->setAlign('center');
            $column->setVideoPlayerHeight('50');
            $column->setVideoPlayerWidth('50');
            $grid->AddExportColumn($column);
            
            //
            // View column for lson_video2 field
            //
            $column = new ExternalVideoViewColumn('lson_video2', 'lson_video2', 'الفيديو الثاني', $this->dataset, '');
            $column->SetOrderable(true);
            $column->setAlign('center');
            $column->setVideoPlayerHeight('50');
            $column->setVideoPlayerWidth('50');
            $grid->AddExportColumn($column);
            
            //
            // View column for lson_video3 field
            //
            $column = new ExternalVideoViewColumn('lson_video3', 'lson_video3', 'الفيديو الثالث', $this->dataset, '');
            $column->SetOrderable(true);
            $column->setAlign('center');
            $column->setVideoPlayerHeight('50');
            $column->setVideoPlayerWidth('50');
            $grid->AddExportColumn($column);
            
            //
            // View column for lson_audio1 field
            //
            $column = new ExternalAudioViewColumn('lson_audio1', 'lson_audio1', 'الملف الصوتي الاول', $this->dataset, '');
            $column->SetOrderable(true);
            $column->setAlign('center');
            $grid->AddExportColumn($column);
            
            //
            // View column for lson_audio2 field
            //
            $column = new ExternalAudioViewColumn('lson_audio2', 'lson_audio2', 'الملف ا لصوتي الثاني', $this->dataset, '');
            $column->SetOrderable(true);
            $column->setAlign('center');
            $grid->AddExportColumn($column);
            
            //
            // View column for lson_audio3 field
            //
            $column = new ExternalAudioViewColumn('lson_audio3', 'lson_audio3', 'الملف الصوتي الثالث', $this->dataset, '');
            $column->SetOrderable(true);
            $column->setAlign('center');
            $grid->AddExportColumn($column);
            
            //
            // View column for lson_youtube_video1 field
            //
            $column = new TextViewColumn('lson_youtube_video1', 'lson_youtube_video1', 'Youtube1st', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddExportColumn($column);
            
            //
            // View column for lson_youtube_video2 field
            //
            $column = new TextViewColumn('lson_youtube_video2', 'lson_youtube_video2', 'Youtube2nd', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddExportColumn($column);
            
            //
            // View column for lson_youtube_video3 field
            //
            $column = new TextViewColumn('lson_youtube_video3', 'lson_youtube_video3', 'Youtube3rd', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddExportColumn($column);
            
            //
            // View column for lson_resource1 field
            //
            $column = new TextViewColumn('lson_resource1', 'lson_resource1', 'المصدر الأول', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddExportColumn($column);
            
            //
            // View column for lson_resource2 field
            //
            $column = new TextViewColumn('lson_resource2', 'lson_resource2', 'المصدر الثاني', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddExportColumn($column);
            
            //
            // View column for lson_resource3 field
            //
            $column = new TextViewColumn('lson_resource3', 'lson_resource3', 'المصدر الثالث', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddExportColumn($column);
            
            //
            // View column for lson_status field
            //
            $column = new CheckboxViewColumn('lson_status', 'lson_status', 'استعراض', $this->dataset);
            $column->SetOrderable(true);
            $column->setDisplayValues('<span class="pg-row-checkbox checked"></span>', '<span class="pg-row-checkbox"></span>');
            $grid->AddExportColumn($column);
            
            //
            // View column for user_id field
            //
            $column = new NumberViewColumn('user_id', 'user_id', 'المستخدم', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddExportColumn($column);
        }
    
        private function AddCompareColumns(Grid $grid)
        {
            //
            // View column for cat_name field
            //
            $column = new TextViewColumn('cat_id', 'cat_id_cat_name', 'القسم', $this->dataset);
            $column->SetOrderable(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for lson_auth field
            //
            $column = new TextViewColumn('lson_auth', 'lson_auth', 'الكاتب', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddCompareColumn($column);
            
            //
            // View column for lson_subject field
            //
            $column = new TextViewColumn('lson_subject', 'lson_subject', 'الموضوغ', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddCompareColumn($column);
            
            //
            // View column for lson_date field
            //
            $column = new DateTimeViewColumn('lson_date', 'lson_date', 'تاريخ الانشاء', $this->dataset);
            $column->SetOrderable(true);
            $column->SetDateTimeFormat('Y-m-d H:i:s');
            $grid->AddCompareColumn($column);
            
            //
            // View column for lson_short_text field
            //
            $column = new TextViewColumn('lson_short_text', 'lson_short_text', 'الملخص', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddCompareColumn($column);
            
            //
            // View column for lson_full_text field
            //
            $column = new TextViewColumn('lson_full_text', 'lson_full_text', 'النص', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(50);
            $column->SetReplaceLFByBR(true);
            $grid->AddCompareColumn($column);
            
            //
            // View column for lson_details field
            //
            $column = new TextViewColumn('lson_details', 'lson_details', 'التفاصيل', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(50);
            $grid->AddCompareColumn($column);
            
            //
            // View column for lson_notes field
            //
            $column = new TextViewColumn('lson_notes', 'lson_notes', 'الملاحظات', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(50);
            $grid->AddCompareColumn($column);
            
            //
            // View column for lson_icon field
            //
            $column = new ExternalImageViewColumn('lson_icon', 'lson_icon', 'الايقونة', $this->dataset);
            $column->SetOrderable(true);
            $column->setHeight('32');
            $column->setWidth('32');
            $grid->AddCompareColumn($column);
            
            //
            // View column for lson_img1 field
            //
            $column = new ExternalImageViewColumn('lson_img1', 'lson_img1', 'الصورة الأولى', $this->dataset);
            $column->SetOrderable(true);
            $column->setAlign('center');
            $column->setHeight('50');
            $column->setWidth('50');
            $grid->AddCompareColumn($column);
            
            //
            // View column for lson_img2 field
            //
            $column = new ExternalImageViewColumn('lson_img2', 'lson_img2', 'الصورة الثانية', $this->dataset);
            $column->SetOrderable(true);
            $column->setAlign('center');
            $column->setHeight('50');
            $column->setWidth('50');
            $grid->AddCompareColumn($column);
            
            //
            // View column for lson_img3 field
            //
            $column = new ExternalImageViewColumn('lson_img3', 'lson_img3', 'الصورة الثالثة', $this->dataset);
            $column->SetOrderable(true);
            $column->setAlign('center');
            $column->setHeight('50');
            $column->setWidth('50');
            $grid->AddCompareColumn($column);
            
            //
            // View column for lson_link1 field
            //
            $column = new TextViewColumn('lson_link1', 'lson_link1', 'الرابط الأول', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddCompareColumn($column);
            
            //
            // View column for lson_link2 field
            //
            $column = new TextViewColumn('lson_link2', 'lson_link2', 'الرابط الثاني', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddCompareColumn($column);
            
            //
            // View column for lson_link3 field
            //
            $column = new TextViewColumn('lson_link3', 'lson_link3', 'الرابط الثالث', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddCompareColumn($column);
            
            //
            // View column for lson_video1 field
            //
            $column = new ExternalVideoViewColumn('lson_video1', 'lson_video1', 'الفيديو الأول', $this->dataset, '');
            $column->SetOrderable(true);
            $column->setAlign('center');
            $column->setVideoPlayerHeight('50');
            $column->setVideoPlayerWidth('50');
            $grid->AddCompareColumn($column);
            
            //
            // View column for lson_video2 field
            //
            $column = new ExternalVideoViewColumn('lson_video2', 'lson_video2', 'الفيديو الثاني', $this->dataset, '');
            $column->SetOrderable(true);
            $column->setAlign('center');
            $column->setVideoPlayerHeight('50');
            $column->setVideoPlayerWidth('50');
            $grid->AddCompareColumn($column);
            
            //
            // View column for lson_video3 field
            //
            $column = new ExternalVideoViewColumn('lson_video3', 'lson_video3', 'الفيديو الثالث', $this->dataset, '');
            $column->SetOrderable(true);
            $column->setAlign('center');
            $column->setVideoPlayerHeight('50');
            $column->setVideoPlayerWidth('50');
            $grid->AddCompareColumn($column);
            
            //
            // View column for lson_audio1 field
            //
            $column = new ExternalAudioViewColumn('lson_audio1', 'lson_audio1', 'الملف الصوتي الاول', $this->dataset, '');
            $column->SetOrderable(true);
            $column->setAlign('center');
            $grid->AddCompareColumn($column);
            
            //
            // View column for lson_audio2 field
            //
            $column = new ExternalAudioViewColumn('lson_audio2', 'lson_audio2', 'الملف ا لصوتي الثاني', $this->dataset, '');
            $column->SetOrderable(true);
            $column->setAlign('center');
            $grid->AddCompareColumn($column);
            
            //
            // View column for lson_audio3 field
            //
            $column = new ExternalAudioViewColumn('lson_audio3', 'lson_audio3', 'الملف الصوتي الثالث', $this->dataset, '');
            $column->SetOrderable(true);
            $column->setAlign('center');
            $grid->AddCompareColumn($column);
            
            //
            // View column for lson_youtube_video1 field
            //
            $column = new TextViewColumn('lson_youtube_video1', 'lson_youtube_video1', 'Youtube1st', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddCompareColumn($column);
            
            //
            // View column for lson_youtube_video2 field
            //
            $column = new TextViewColumn('lson_youtube_video2', 'lson_youtube_video2', 'Youtube2nd', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddCompareColumn($column);
            
            //
            // View column for lson_youtube_video3 field
            //
            $column = new TextViewColumn('lson_youtube_video3', 'lson_youtube_video3', 'Youtube3rd', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddCompareColumn($column);
            
            //
            // View column for lson_resource1 field
            //
            $column = new TextViewColumn('lson_resource1', 'lson_resource1', 'المصدر الأول', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddCompareColumn($column);
            
            //
            // View column for lson_resource2 field
            //
            $column = new TextViewColumn('lson_resource2', 'lson_resource2', 'المصدر الثاني', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddCompareColumn($column);
            
            //
            // View column for lson_resource3 field
            //
            $column = new TextViewColumn('lson_resource3', 'lson_resource3', 'المصدر الثالث', $this->dataset);
            $column->SetOrderable(true);
            $column->SetMaxLength(75);
            $grid->AddCompareColumn($column);
            
            //
            // View column for lson_status field
            //
            $column = new CheckboxViewColumn('lson_status', 'lson_status', 'استعراض', $this->dataset);
            $column->SetOrderable(true);
            $column->setDisplayValues('<span class="pg-row-checkbox checked"></span>', '<span class="pg-row-checkbox"></span>');
            $grid->AddCompareColumn($column);
            
            //
            // View column for user_id field
            //
            $column = new NumberViewColumn('user_id', 'user_id', 'المستخدم', $this->dataset);
            $column->SetOrderable(true);
            $column->setNumberAfterDecimal(0);
            $column->setThousandsSeparator(',');
            $column->setDecimalSeparator('');
            $grid->AddCompareColumn($column);
        }
    
        private function AddCompareHeaderColumns(Grid $grid)
        {
    
        }
    
        public function GetPageDirection()
        {
            return 'rtl';
        }
    
        public function isFilterConditionRequired()
        {
            return false;
        }
    
        protected function ApplyCommonColumnEditProperties(CustomEditColumn $column)
        {
            $column->SetDisplaySetToNullCheckBox(false);
            $column->SetDisplaySetToDefaultCheckBox(false);
    		$column->SetVariableContainer($this->GetColumnVariableContainer());
        }
    
        function GetCustomClientScript()
        {
            return ;
        }
        
        function GetOnPageLoadedClientScript()
        {
            return ;
        }
        
        public function GetEnableModalGridInsert() { return true; }
        public function GetEnableModalSingleRecordView() { return true; }
        
        public function GetEnableModalGridEdit() { return true; }
        
        protected function GetEnableModalGridDelete() { return true; }
        
        public function GetEnableModalGridCopy() { return true; }
    
        protected function CreateGrid()
        {
            $result = new Grid($this, $this->dataset);
            if ($this->GetSecurityInfo()->HasDeleteGrant())
               $result->SetAllowDeleteSelected(true);
            else
               $result->SetAllowDeleteSelected(false);   
            
            ApplyCommonPageSettings($this, $result);
            
            $result->SetUseImagesForActions(true);
            $defaultSortedColumns = array();
            $defaultSortedColumns[] = new SortColumn('cat_id_cat_name', 'ASC');
            $defaultSortedColumns[] = new SortColumn('id', 'DESC');
            $result->setDefaultOrdering($defaultSortedColumns);
            $result->SetUseFixedHeader(true);
            $result->SetShowLineNumbers(false);
            $result->SetShowKeyColumnsImagesInHeader(false);
            $result->SetViewMode(ViewMode::TABLE);
            $result->setEnableRuntimeCustomization(true);
            $result->setAllowCompare(true);
            $this->AddCompareHeaderColumns($result);
            $this->AddCompareColumns($result);
            $result->setMultiEditAllowed($this->GetSecurityInfo()->HasEditGrant() && true);
            $result->setUseModalMultiEdit(true);
            $result->setTableBordered(true);
            $result->setTableCondensed(false);
            
            $result->SetHighlightRowAtHover(true);
            $result->SetWidth('');
    
            $this->AddFieldColumns($result);
            $this->AddSingleRecordViewColumns($result);
            $this->AddEditColumns($result);
            $this->AddMultiEditColumns($result);
            $this->AddInsertColumns($result);
            $this->AddPrintColumns($result);
            $this->AddExportColumns($result);
            $this->AddMultiUploadColumn($result);
    
            $this->AddOperationsColumns($result);
            $this->SetViewFormTitle('عرض الدرس | %lson_subject%');
            $this->SetEditFormTitle('تحرير الدرس | %lson_subject%');
            $this->SetInsertFormTitle('اضافة درس جديد');
            $this->SetShowPageList(true);
            $this->SetShowTopPageNavigator(true);
            $this->SetShowBottomPageNavigator(false);
            $this->setPrintListAvailable(true);
            $this->setPrintListRecordAvailable(false);
            $this->setPrintOneRecordAvailable(true);
            $this->setAllowPrintSelectedRecords(true);
            $this->setExportListAvailable(array('pdf', 'excel', 'word', 'xml', 'csv'));
            $this->setExportSelectedRecordsAvailable(array('pdf', 'excel', 'word', 'xml', 'csv'));
            $this->setExportListRecordAvailable(array());
            $this->setExportOneRecordAvailable(array('pdf', 'excel', 'word', 'xml', 'csv'));
            $this->setModalViewSize(Modal::SIZE_LG);
            $this->setModalFormSize(Modal::SIZE_LG);
    
            return $result;
        }
     
        protected function setClientSideEvents(Grid $grid) {
    
        }
    
        protected function doRegisterHandlers() {
            $lookupDataset = new TableDataset(
                MySqlIConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`categories`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('id', true, true, true),
                    new StringField('cat_name', true),
                    new StringField('cat_desc'),
                    new StringField('cat_img'),
                    new IntegerField('cat_status'),
                    new DateTimeField('cat_created'),
                    new IntegerField('user_id')
                )
            );
            $lookupDataset->setOrderByField('cat_name', 'ASC');
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), 'cat_status=1'));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'insert_lessons_cat_id_search', 'id', 'cat_name', null, 50);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MySqlIConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`categories`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('id', true, true, true),
                    new StringField('cat_name', true),
                    new StringField('cat_desc'),
                    new StringField('cat_img'),
                    new IntegerField('cat_status'),
                    new DateTimeField('cat_created'),
                    new IntegerField('user_id')
                )
            );
            $lookupDataset->setOrderByField('cat_name', 'ASC');
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), 'cat_status=1'));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'filter_builder_lessons_cat_id_search', 'id', 'cat_name', null, 50);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MySqlIConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`categories`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('id', true, true, true),
                    new StringField('cat_name', true),
                    new StringField('cat_desc'),
                    new StringField('cat_img'),
                    new IntegerField('cat_status'),
                    new DateTimeField('cat_created'),
                    new IntegerField('user_id')
                )
            );
            $lookupDataset->setOrderByField('cat_name', 'ASC');
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), 'cat_status=1'));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'edit_lessons_cat_id_search', 'id', 'cat_name', null, 50);
            GetApplication()->RegisterHTTPHandler($handler);
            
            $lookupDataset = new TableDataset(
                MySqlIConnectionFactory::getInstance(),
                GetConnectionOptions(),
                '`categories`');
            $lookupDataset->addFields(
                array(
                    new IntegerField('id', true, true, true),
                    new StringField('cat_name', true),
                    new StringField('cat_desc'),
                    new StringField('cat_img'),
                    new IntegerField('cat_status'),
                    new DateTimeField('cat_created'),
                    new IntegerField('user_id')
                )
            );
            $lookupDataset->setOrderByField('cat_name', 'ASC');
            $lookupDataset->AddCustomCondition(EnvVariablesUtils::EvaluateVariableTemplate($this->GetColumnVariableContainer(), 'cat_status=1'));
            $handler = new DynamicSearchHandler($lookupDataset, $this, 'multi_edit_lessons_cat_id_search', 'id', 'cat_name', null, 50);
            GetApplication()->RegisterHTTPHandler($handler);
        }
       
        protected function doCustomRenderColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderPrintColumn($fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomRenderExportColumn($exportType, $fieldName, $fieldData, $rowData, &$customText, &$handled)
        { 
    
        }
    
        protected function doCustomDrawRow($rowData, &$cellFontColor, &$cellFontSize, &$cellBgColor, &$cellItalicAttr, &$cellBoldAttr)
        {
    
        }
    
        protected function doExtendedCustomDrawRow($rowData, &$rowCellStyles, &$rowStyles, &$rowClasses, &$cellClasses)
        {
    
        }
    
        protected function doCustomRenderTotal($totalValue, $aggregate, $columnName, &$customText, &$handled)
        {
    
        }
    
        protected function doCustomDefaultValues(&$values, &$handled) 
        {
    
        }
    
        protected function doCustomCompareColumn($columnName, $valueA, $valueB, &$result)
        {
    
        }
    
        protected function doBeforeInsertRecord($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doBeforeUpdateRecord($page, $oldRowData, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doBeforeDeleteRecord($page, &$rowData, $tableName, &$cancel, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterInsertRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterUpdateRecord($page, $oldRowData, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doAfterDeleteRecord($page, $rowData, $tableName, &$success, &$message, &$messageDisplayTime)
        {
    
        }
    
        protected function doCustomHTMLHeader($page, &$customHtmlHeaderText)
        { 
    
        }
    
        protected function doGetCustomTemplate($type, $part, $mode, &$result, &$params)
        {
    
        }
    
        protected function doGetCustomExportOptions(Page $page, $exportType, $rowData, &$options)
        {
    
        }
    
        protected function doFileUpload($fieldName, $rowData, &$result, &$accept, $originalFileName, $originalFileExtension, $fileSize, $tempFileName)
        {
    
        }
    
        protected function doPrepareChart(Chart $chart)
        {
    
        }
    
        protected function doPrepareColumnFilter(ColumnFilter $columnFilter)
        {
    
        }
    
        protected function doPrepareFilterBuilder(FilterBuilder $filterBuilder, FixedKeysArray $columns)
        {
    
        }
    
        protected function doGetSelectionFilters(FixedKeysArray $columns, &$result)
        {
    
        }
    
        protected function doGetCustomFormLayout($mode, FixedKeysArray $columns, FormLayout $layout)
        {
    
        }
    
        protected function doGetCustomColumnGroup(FixedKeysArray $columns, ViewColumnGroup $columnGroup)
        {
    
        }
    
        protected function doPageLoaded()
        {
    
        }
    
        protected function doCalculateFields($rowData, $fieldName, &$value)
        {
    
        }
    
        protected function doGetCustomRecordPermissions(Page $page, &$usingCondition, $rowData, &$allowEdit, &$allowDelete, &$mergeWithDefault, &$handled)
        {
    
        }
    
        protected function doAddEnvironmentVariables(Page $page, &$variables)
        {
    
        }
    
    }

    SetUpUserAuthorization();

    try
    {
        $Page = new lessonsPage("lessons", "lessons.php", GetCurrentUserPermissionsForPage("lessons"), 'UTF-8');
        $Page->SetRecordPermission(GetCurrentUserRecordPermissionsForDataSource("lessons"));
        GetApplication()->SetMainPage($Page);
        GetApplication()->Run();
    }
    catch(Exception $e)
    {
        ShowErrorPage($e);
    }
	
