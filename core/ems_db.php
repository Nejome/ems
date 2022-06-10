<?php

use Carbon\Carbon;

class ems_db
{
    public $db;

    public function __construct($data)
    {

        try {
            $this->db = new PDO($data['connection'] . ";dbname=" . $data['dbname'] . ";charset=utf8",
                $data['username'],
                $data['password']);

        } catch (PDOException $e) {

            print "couldn't connect due " . $e->getMessage();

        }


    }

    /**Hear is all employees methods
     *get_all_employees
     *get_an_employee
     * insert_an_employee
     * update_an_employee
     * delete_an_employee
     */

    public function get_all_employees()
    {

        $stmt = $this->db->query("SELECT ems.*, jobs.job_name
                                           from employees ems 
                                           inner join jobs
                                           where ems.job_id = jobs.job_id");

        return $stmt->fetchAll();

    }

    public function get_employees(){

        $stmt = $this->db->query("SELECT * from employees");

        return $stmt->fetchAll();

    }

    public function get_all_official()
    {

        $stmt = $this->db->query("SELECT ems.*, jobs.job_name, mg.management_name
                                           from employees ems 
                                           inner join jobs, managements mg
                                           where ems.job_id = jobs.job_id and ems.branch_id = mg.management_id and ems.type = 1");

        return $stmt->fetchAll();

    }

    public function get_all_academic()
    {

        $stmt = $this->db->query("SELECT ems.*, jobs.job_name, co.collage_name 
                                           from employees ems 
                                           inner join jobs, collages co 
                                           where ems.job_id = jobs.job_id and ems.branch_id = co.collage_id and ems.type = 2");

        return $stmt->fetchAll();

    }

    public function get_an_employee($id)
    {

        $stmt = $this->db->prepare("SELECT ems.*, jobs.job_name, mg.management_name 
                                           from employees ems 
                                           inner join jobs, managements mg 
                                           where ems.job_id = jobs.job_id and ems.branch_id = mg.management_id and employee_id = :id");
        $stmt->execute(array(':id' => $id));

        return $row = $stmt->fetch();

    }

    public function get_an_official($id)
    {

        $stmt = $this->db->prepare("SELECT ems.*, jobs.job_name, manager.name as manager_name, mg.management_name as branch
                                           from employees ems, employees manager 
                                           inner join jobs, managements mg 
                                           where ems.job_id = jobs.job_id and ems.branch_id = mg.management_id and manager.employee_id = mg.management_manager 
                                           and ems.type = 1 and ems.employee_id = :id");
        $stmt->execute(array(':id' => $id));

        return $row = $stmt->fetch();

    }

    public function get_an_academic($id)
    {

        $stmt = $this->db->prepare("SELECT ems.*, jobs.job_name, manager.name as manager_name, co.collage_name as branch 
                                           from employees ems, employees manager 
                                           inner join jobs, collages co 
                                           where ems.job_id = jobs.job_id and ems.branch_id = co.collage_id and manager.employee_id = co.collage_manager 
                                           and ems.type = 2 and ems.employee_id = :id");
        $stmt->execute(array(':id' => $id));

        return $row = $stmt->fetch();

    }

    public function insert_an_official($data)
    {

        $stmt = $this->db->prepare("insert into employees(type, name, berth_day, address, gender, phone, email, 
                                              branch_id, job_id, hiring_date, qualification, contract_type, 
                                              main_salary, premiums, salary_total) values(1, :name, :berth_day, :address, :gender, :phone, :email,
                                              :branch_id, :job_id, :hiring_date, :qualification, :contract_type,
                                              :main_salary, :premiums, :salary_total)");
        $stmt->execute(array(
            ':name' => $data['name'],
            ':berth_day' => $data['berth_day'],
            ':address' => $data['address'],
            ':gender' => $data['gender'],
            ':phone' => $data['phone'],
            ':email' => $data['email'],
            ':job_id' => $data['job_name'],
            ':branch_id' => $data['branch_id'],
            ':hiring_date' => $data['hire-date'],
            ':qualification' => $data['edu-qua'],
            ':contract_type' => $data['contract-type'],
            ':main_salary' => $data['main_salary'],
            ':premiums' => $data['premiums'],
            ':salary_total' => $data['main_salary'] + $data['premiums']
        ));

    }


    public function insert_an_academic($data)
    {

        $stmt = $this->db->prepare("insert into employees(type, name, berth_day, address, gender, phone, email, 
                                              branch_id, job_id, hiring_date, qualification, contract_type, 
                                              main_salary, premiums, salary_total) values(2, :name, :berth_day, :address, :gender, :phone, :email,
                                              :branch_id, :job_id, :hiring_date, :qualification, :contract_type,
                                              :main_salary, :premiums, :salary_total)");
        $stmt->execute(array(
            ':name' => $data['name'],
            ':berth_day' => $data['berth_day'],
            ':address' => $data['address'],
            ':gender' => $data['gender'],
            ':phone' => $data['phone'],
            ':email' => $data['email'],
            ':branch_id' => $data['branch_id'],
            ':job_id' => $data['job_name'],
            ':hiring_date' => $data['hire-date'],
            ':qualification' => $data['edu-qua'],
            ':contract_type' => $data['contract-type'],
            ':main_salary' => $data['main_salary'],
            ':premiums' => $data['premiums'],
            ':salary_total' => $data['main_salary'] + $data['premiums']
        ));

    }

    public function set_file_number($department_string)
    {

        $stmt = $this->db->query("select employee_id from employees where file_number is null");
        $row = $stmt->fetch();

        $qe = $this->db->prepare("update employees set file_number = concat(:string, :id) where employee_id = :employee_id")
            ->execute(array(
                ':string' => $department_string,
                ':id' => $row['employee_id'],
                ':employee_id' => $row['employee_id']
            ));

    }

    public function update_file_number($id, $string){



    }

    public function update_an_official($id, $data)
    {

        $stmt = $this->db->prepare("update employees set name = :name, berth_day = :berth_day,
                                                                       address = :address,  gender = :gender, 
                                                                       phone = :phone, email = :email, 
                                                                       branch_id = :branch_id, job_id = :job_id, 
                                                                       hiring_date = :hiring_date, qualification = :qualification, 
                                                                       contract_type = :contract_type, 
                                                                       main_salary = :main_salary, premiums = :premiums,
                                                                       salary_total = :salary_total 
                                                                       where employee_id = :employee_id");
        $stmt->execute(array(
            ':name' => $data['name'],
            ':berth_day' => $data['berth'],
            ':address' => $data['address'],
            ':gender' => $data['gender'],
            ':phone' => $data['phone'],
            ':email' => $data['email'],
            ':job_id' => $data['job_name'],
            ':branch_id' => $data['branch_id'],
            ':hiring_date' => $data['hiring_date'],
            ':qualification' => $data['qualification'],
            ':contract_type' => $data['contract_type'],
            ':main_salary' => $data['main_salary'],
            ':premiums' => $data['premiums'],
            ':salary_total' => $data['main_salary'] + $data['premiums'],
            ':employee_id' => $id
        ));

    }

    public function update_an_academic($id, $data)
    {

        $stmt = $this->db->prepare("update employees set name = :name, berth_day = :berth_day,
                                                                       address = :address,  gender = :gender, 
                                                                       phone = :phone, email = :email, 
                                                                       branch_id = :branch_id, job_id = :job_id, 
                                                                       hiring_date = :hiring_date, qualification = :qualification, 
                                                                       contract_type = :contract_type, 
                                                                       main_salary = :main_salary, premiums = :premiums,
                                                                       salary_total = :salary_total 
                                                                       where employee_id = :employee_id");
        $stmt->execute(array(
            ':name' => $data['name'],
            ':berth_day' => $data['berth'],
            ':address' => $data['address'],
            ':gender' => $data['gender'],
            ':phone' => $data['phone'],
            ':email' => $data['email'],
            ':job_id' => $data['job_name'],
            ':branch_id' => $data['branch_id'],
            ':hiring_date' => $data['hiring_date'],
            ':qualification' => $data['qualification'],
            ':contract_type' => $data['contract_type'],
            ':main_salary' => $data['main_salary'],
            ':premiums' => $data['premiums'],
            ':salary_total' => $data['main_salary'] + $data['premiums'],
            ':employee_id' => $id
        ));

    }

    public function delete_an_employee($id)
    {

        $this->db->prepare("DELETE FROM employees WHERE employee_id = :employee_id")
            ->execute([':employee_id' => $id]);

    }

    /*hear is jobs methods
     *
     */

    public function get_an_job($id)
    {

        $stmt = $this->db->prepare("select * from jobs where job_id = :job_id");
        $stmt->execute(array('job_id' => $id));

        return $stmt->fetch();

    }

    public function insert_an_job($data)
    {

        $stmt = $this->db->prepare("insert into jobs(type, job_name, main_salary, leave_duration, branch_id)
                                     values(:type, :job_name, :main_salary, :leave_duration, :branch_id)");
        $stmt->execute(array(
            ':type' => $data['type'],
            ':job_name' => $data['name'],
            ':main_salary' => $data['main_salary'],
            ':leave_duration' => $data['leave_duration'],
            ':branch_id' => $data['branch_id']
        ));

    }

    public function update_an_job($id, $data)
    {

        $stmt = $this->db->prepare("update jobs set job_name = :job_name, main_salary = :main_salary,
                                     leave_duration = :leave_duration, branch_id = :branch_id
                                     where job_id = :job_id");

        $stmt->execute(array(
            ':job_name' => $data['name'],
            ':main_salary' => $data['main_salary'],
            ':leave_duration' => $data['leave_duration'],
            ':branch_id' => $data['branch_id'],
            ':job_id' => $id
        ));
    }

    public function delete_an_job($id)
    {

        $stmt = $this->db->prepare("delete from jobs where job_id = :job_id");

        $stmt->execute(array(':job_id' => $id));

    }


    /*hear is managements methods
     *
     */

    public function get_all_managements(){

       $stmt = $this->db->query("select mg.*, managers.name as manager_name 
                                          from managements mg
                                          inner join employees managers
                                          where mg.management_manager = managers.employee_id");

        return $stmt->fetchAll();

    }

    public function get_an_managements($id){

        $stmt = $this->db->prepare("select mg.*, managers.name as manager_name 
                                          from managements mg
                                          inner join employees managers
                                          where mg.management_manager = managers.employee_id
                                          and mg.management_id = :id");

        $stmt->execute(array(':id' => $id));

        return $stmt->fetch();

    }

    public function get_managements_jobs(){

        $stmt = $this->db->query("select jobs.*, mgs.management_name 
                                           from jobs
                                           inner join managements mgs 
                                           where jobs.branch_id = mgs.management_id and type = 1");

        return $stmt->fetchAll();

    }

    public function insert_an_management($data)
    {

            $stmt = $this->db->prepare("insert into managements(management_name, management_symbol, management_manager)
                                     values(:management_name, :management_symbol, :management_manager)");
            $stmt->execute(array(':management_name' => $data['management_name'],
                ':management_symbol' => $data['management_symbol'],
                ':management_manager' => $data['management_manager']));

    }

    public function update_an_management($id, $data) {

        $stmt = $this->db->prepare("update managements set management_name = :management_name,
                                             management_symbol = :management_symbol, management_manager = :management_manager
                                             where management_id = :id");
        $stmt->execute(array(':management_name' => $data['management_name'],
                             ':management_symbol' => $data['management_symbol'],
                             ':management_manager' => $data['management_manager'],
                             ':id' => $id));

    }

    public function delete_an_management($id){

        $stmt = $this->db->prepare("delete from managements where management_id = :id")
            ->execute(array(':id' => $id));

    }



    /*hear is collages methods
     *
     */

    public function get_all_collages(){

        $stmt = $this->db->query("select co.*, managers.name as manager_name 
                                          from collages co
                                          inner join employees managers
                                          where co.collage_manager = managers.employee_id");

        return $stmt->fetchAll();

    }

    public function get_an_collage($id){

        $stmt = $this->db->prepare("select * from collages where collage_id = :id");

        $stmt->execute(array(':id' => $id));

        return $stmt->fetch();

    }

    public function get_collages_jobs(){

        $stmt = $this->db->query("select jobs.*, collages.collage_name 
                                           from jobs
                                           inner join collages 
                                           where jobs.branch_id = collages.collage_id and type = 2");

        return $stmt->fetchAll();

    }

    public function insert_an_collage($data)
    {

        $stmt = $this->db->prepare("insert into collages(collage_name, collage_symbol, collage_manager)
                                     values(:collage_name, :collage_symbol, :collage_manager)");
        $stmt->execute(array(':collage_name' => $data['collage_name'],
            ':collage_symbol' => $data['collage_symbol'],
            ':collage_manager' => $data['collage_manager']));

    }

    public function update_an_collage($id, $data) {

        $stmt = $this->db->prepare("update collages set collage_name = :collage_name,
                                             collage_symbol = :collage_symbol, collage_manager = :collage_manager
                                             where collage_id = :id");
        $stmt->execute(array(':collage_name' => $data['collage_name'],
            ':collage_symbol' => $data['collage_symbol'],
            ':collage_manager' => $data['collage_manager'],
            ':id' => $id));

    }

    public function delete_an_collage($id){

        $stmt = $this->db->prepare("delete from collages where collage_id = :id")
            ->execute(array(':id' => $id));

    }

    /*
     * hear is Leaves methods
     */

    public function get_leaves_info_of($id){

        $stmt = $this->db->prepare("select leaves_information.*, employees.name 
                                             from leaves_information 
                                             inner join employees
                                             where leaves_information.employee_id = employees.employee_id and leaves_information.employee_id = :id");
            $stmt->execute(array(':id' => $id));

        return $stmt->fetch();

    }

    public function add_request($data){

        $stmt = $this->db->prepare("insert into leaves_requests(employee_id, post_date, type, from_date, to_date, notes, position, status) 
                                             values(:employee_id, :post_date, :type, :from_date, :to_date, :notes, 1, 2)");

        $stmt->execute(array(':employee_id' => $data['employee_id'],
                             ':post_date' => $data['post_date'],
                             ':type' => $data['type'],
                             ':from_date' => $data['from_date'],
                             ':to_date' => $data['to_date'],
                             ':notes' => $data['notes']));

    }

    public function get_requests_of($id){

        $stmt = $this->db->prepare("select * from leaves_requests where employee_id = :id");

        $stmt->execute(array(':id' => $id));

        return $stmt->fetchAll();
    }

    public function get_an_request($id){

        $stmt = $this->db->prepare("select * from leaves_requests where request_id = :id");

        $request = $stmt->execute(array(':id' => $id));

        return $stmt->fetch();
    }

    public function update_request($id, $data){

            $stmt = $this->db->prepare("update leaves_requests set type = :type, from_date = :from_date, to_date = :to_date, notes = :notes
                                             where request_id = :id");

            $stmt->execute(array(
                ':type' => $data['type'],
                ':from_date' => $data['from_date'],
                ':to_date' => $data['to_date'],
                ':notes' => $data['notes'],
                ':id' => $id ));
    }

    public function get_my_employees($manager_id){

        $qu = $this->db->prepare("select * from employees where employee_id = :id");

        $qu->execute(array(':id' => $manager_id));

        $manager = $qu->fetch();

        $stmt = $this->db->prepare("select * from employees where type = :manager_type and branch_id = :manager_branch_id 
                                              and employee_id != :manager_employee_id");
        $stmt->execute(array(':manager_type' => $manager['type'],
                             ':manager_branch_id' => $manager['branch_id'],
                             ':manager_employee_id' => $manager['employee_id'],));

        return $stmt->fetchAll();

    }

    public function get_new_requests_of($employee_id){

        $stmt = $this->db->prepare("select * from leaves_requests where employee_id = :employee_id and position = 1");

        $stmt->execute(array(':employee_id' => $employee_id));

        return $stmt->fetchAll();

    }

    public function manager_decision($request_id, $data){

        $stmt = $this->db->prepare("update leaves_requests set manager_notes = :manager_notes, position = :position, status = :status where request_id = :request_id")
        ->execute(array(':manager_notes' => $data['manager_notes'],':position' => $data['position'], ':status' => $data['status'], ':request_id' => $request_id));

    }


    public function admin_decision($employee_id, $request_id, $data){

        $stmt = $this->db->prepare("update leaves_requests set admin_notes = :admin_notes, position = :position, status = :status where request_id = :request_id")
            ->execute(array(':admin_notes' => $data['admin_notes'],':position' => $data['position'], ':status' => $data['status'], ':request_id' => $request_id));

        $this->db->prepare("update leaves_information set available_days = available_days - :days, last_leave = :last_leave, last_update = :today where employee_id = :id")
        ->execute(array(':days' => $data['days'], ':last_leave' => $data['to'], ':id' => $employee_id, ':today' => Carbon::today()));

    }


    public function add_manager_request($data){

        $stmt = $this->db->prepare("insert into leaves_requests(employee_id, post_date, type, from_date, to_date, notes, position, status) 
                                             values(:employee_id, :post_date, :type, :from_date, :to_date, :notes, 2, 2)");

        $stmt->execute(array(':employee_id' => $data['employee_id'],
            ':post_date' => $data['post_date'],
            ':type' => $data['type'],
            ':from_date' => $data['from_date'],
            ':to_date' => $data['to_date'],
            ':notes' => $data['notes']));

    }

    public function get_all_requests_of($employee_id){

        $stmt = $this->db->prepare("select * from leaves_requests where employee_id = :employee_id");

        $stmt->execute(array(':employee_id' => $employee_id));

        return $stmt->fetchAll();

    }

    public function get_requests_for_admin($employee_id){

        $stmt = $this->db->prepare("select * from leaves_requests where employee_id = :id and position = 2");

        $stmt->execute(array(':id' => $employee_id));

        return $stmt->fetchAll();

    }

    /*
     * The Attendance methods
     */

    public function get_an_attendance($employee_id){

        $date = new Carbon();

        $today = $date->toDateString();

        $stmt = $this->db->prepare("select * from attendance where employee_id = :employee_id and day = :today");

        $stmt->execute(array(':employee_id' => $employee_id, ':today' => $today));

        return $stmt->fetchAll();

    }

    public function attend($employee_id){

        $date = new Carbon();

        $today = $date->toDateString();

        $stmt = $this->db->prepare("insert into attendance(employee_id, day, status, attend_time) values(:employee_id, :day, 1, :attend_time)")
            ->execute(array(':employee_id' => $employee_id, ':day' => $today, ':attend_time' => Carbon::now()));

    }

    public function absent($employee_id){

        $date = new Carbon();

        $today = $date->toDateString();

        $stmt = $this->db->prepare("insert into attendance(employee_id, day, status) values(:employee_id, :day, 0)")
            ->execute(array(':employee_id' => $employee_id, ':day' => $today));

    }

    public function get_today_attendance_of($employee_id){

        $date = new Carbon();

        $today = $date->toDateString();

        $stmt = $this->db->prepare("select * from attendance where day = :day and employee_id = :employee_id");

        $stmt->execute(array(':day' => $today, ':employee_id' => $employee_id));

        return $stmt->fetch();

    }

    public function take_departure($id){

        $this->db->prepare("update attendance set departure_time = :departure_time where id = :id")
            ->execute(array(':departure_time' => Carbon::now(), ':id' => $id));

    }

    public function get_all_attendance_of($employee_id){

        $stmt = $this->db->prepare("select * from attendance where employee_id = :id");

        $stmt->execute(array(':id' => $employee_id));

        return $stmt->fetchAll();

    }

    /*
     * The Reports methods
     */

    public function add_report_request($data){

        $this->db->prepare("insert into reports_requests (manager_id, employee_id, type, branch_id)
                                              values(:manager_id, :employee_id, :type, :branch_id)")
        ->execute(array(':manager_id' => $data['manager_id'], ':employee_id' => $data['employee_id'], ':type' => $data['type'], ':branch_id' => $data['branch_id']));

    }

    public function get_reports_requests_for_me($manager_id){

        $stmt = $this->db->prepare("select * from reports_requests where manager_id = :manager_id");
            $stmt->execute(array(':manager_id' => $manager_id));
            return $stmt->fetchAll();

    }

    public function delete_report_request($id){

        $this->db->prepare("delete from reports_requests where id = :id")
            ->execute(array(':id' => $id));

    }

    public function add_academic_report($data){

        $this->db->prepare("insert into academic_reports(employee_id, report_date, r1, r2, r3, r4, r5, r6, r7, r8, r9, r10, recommendations)
                                     values(:employee_id, :report_date, :r1, :r2, :r3, :r4, :r5, :r6, :r7, :r8, :r9, :r10, :recommendations)")
            ->execute(array(':employee_id' => $data['employee_id'], ':report_date' => Carbon::now(),
                ':r1' => $data['r1'],
                ':r2' => $data['r2'],
                ':r3' => $data['r3'],
                ':r4' => $data['r4'],
                ':r5' => $data['r5'],
                ':r6' => $data['r6'],
                ':r7' => $data['r7'],
                ':r8' => $data['r8'],
                ':r9' => $data['r9'],
                ':r10' => $data['r10'],
                ':recommendations' => $data['recommendations'],));

    }

    public function add_official_report($data){

        $this->db->prepare("insert into official_reports(employee_id, report_date, r1, r2, recommendations) 
                                     values(:employee_id, :report_date, :r1, :r2, :recommendations)")
            ->execute(array(':employee_id' => $data['employee_id'], ':report_date' => Carbon::now(),
            ':r1' => $data['r1'], ':r2' => $data['r2'], ':recommendations' => $data['recommendations']));

    }

    public function get_all_academic_reports(){

        $stmt = $this->db->query("select * from academic_reports");

        return $stmt->fetchAll();

    }

    public function get_all_official_reports(){

        $stmt = $this->db->query("select * from official_reports");

        return $stmt->fetchAll();

    }

    public function get_an_official_report($id){

        $stmt = $this->db->prepare("select * from official_reports where id =:id");

        $stmt->execute(array(':id' => $id));

        return $stmt->fetch();

    }

    public function get_an_academic_report($id){

        $stmt = $this->db->prepare("select * from academic_reports where id =:id");

        $stmt->execute(array(':id' => $id));

        return $stmt->fetch();

    }

    public function get_leaves_requests_for_report($id){

        $stmt = $this->db->prepare("select * from leaves_requests where employee_id = :id and status = 1");

        $request = $stmt->execute(array(':id' => $id));

        return $stmt->fetchAll();

    }

}