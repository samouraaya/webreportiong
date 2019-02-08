<?php 

function Provision_prood501_total_2017()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select 
				(select isnull(sum(cur_bal),0) from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no  and ln.class_code=501 and ln.status not in ('Active Charge-Off','closed','incomplete')) 'Total501',
        (select isnull(sum(cur_bal),0) from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.class_code=501 and delq_dt is null and ln.status not in ('Active Charge-Off','closed','incomplete')) 'Sain501',
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.class_code=501 and delq_dt is null and ln.status not in ('Active Charge-Off','closed','incomplete')) 'SainRES501',
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=501 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 0 and 30) 'PAR0501',
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=501 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 0 and 30) 'PAR0RES501',
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=501 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 31 and 60)) 'PAR30501',
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=501 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 61 and 90)) 'PAR60501',
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=501 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 91 and 120)) 'PAR90501',
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=501 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 121 and 180)) 'PAR120501',
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=501 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) >180) 'PAR180501',
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=501 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) >31)) 'PAR30RES501',
        (select isnull(count(cur_bal),0) from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no  and ln.class_code=501 and ln.status not in ('Active Charge-Off','closed','incomplete')) 'Total501nb',
        (select isnull(count(cur_bal),0) from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.class_code=501 and delq_dt is null and ln.status not in ('Active Charge-Off','closed','incomplete')) 'Sain501nb',
				(select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.class_code=501 and delq_dt is null and ln.status not in ('Active Charge-Off','closed','incomplete')) 'SainRES501nb',
				(select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=501 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 0 and 30) 'PAR0501nb',
				(select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=501 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 0 and 30) 'PAR0RES501nb',
				((select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=501 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 31 and 60)) 'PAR30501nb',
				((select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=501 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 61 and 90)) 'PAR60501nb',
				((select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=501 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 91 and 120)) 'PAR90501nb',
				((select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=501 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 121 and 180)) 'PAR120501nb',
				(select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=501 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) >180) 'PAR180501nb',
				((select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=501 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) >31)) 'PAR30RES501nb'
        
        from ov_control ov ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array(
					'Total501'=>number_format($row1['Total501'],3,',',' '),
					'Sain501'=>number_format($row1['Sain501'],3,',',' '),
					'SainRES501'=>number_format($row1['SainRES501'],3,',',' '),
					'PAR0501'=>number_format($row1['PAR0501'],3,',',' '),
					'PAR0RES501'=>number_format($row1['PAR0RES501'],3,',',' '),
					'PAR30501'=>number_format($row1['PAR30501'],3,',',' '),
					'PAR60501'=>number_format($row1['PAR60501'],3,',',' '),
					'PAR90501'=>number_format($row1['PAR90501'],3,',',' '),
					'PAR180501'=>number_format($row1['PAR180501'],3,',',' '),
					'PAR30RES501'=>number_format($row1['PAR30RES501'],3,',',' '),
					'PAR120501'=>number_format($row1['PAR120501'],3,',',' '),
					
					'Total501nb'=>number_format($row1['Total501nb'],0,',',' '),
					'Sain501nb'=>number_format($row1['Sain501nb'],0,',',' '),
					'SainRES501nb'=>number_format($row1['SainRES501nb'],0,',',' '),
					'PAR0501nb'=>number_format($row1['PAR0501nb'],0,',',' '),
					'PAR0RES501nb'=>number_format($row1['PAR0RES501nb'],0,',',' '),
					'PAR30501nb'=>number_format($row1['PAR30501nb'],0,',',' '),
					'PAR60501nb'=>number_format($row1['PAR60501nb'],0,',',' '),
					'PAR90501nb'=>number_format($row1['PAR90501nb'],0,',',' '),
					'PAR180501nb'=>number_format($row1['PAR180501nb'],0,',',' '),
					'PAR120501nb'=>number_format($row1['PAR120501nb'],0,',',' '),
					'PAR30RES501nb'=>number_format($row1['PAR30RES501nb'],0,',',' ')
					);
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}

function Provision_prood511_total_2017()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select 
				(select isnull(sum(cur_bal),0) from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no  and ln.class_code=511 and ln.status not in ('Active Charge-Off','closed','incomplete')) 'Total511',
        (select isnull(sum(cur_bal),0) from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.class_code=511 and delq_dt is null and ln.status not in ('Active Charge-Off','closed','incomplete')) 'Sain511',
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.class_code=511 and delq_dt is null and ln.status not in ('Active Charge-Off','closed','incomplete')) 'SainRES511',
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=511 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 0 and 30) 'PAR0511',
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=511 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 0 and 30) 'PAR0RES511',
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=511 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 31 and 60)) 'PAR30511',
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=511 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 61 and 90)) 'PAR60511',
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=511 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 91 and 120)) 'PAR90511',
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=511 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 121 and 180)) 'PAR120511',
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=511 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) >180) 'PAR180511',
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=511 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) >31)) 'PAR30RES511',
        (select isnull(count(cur_bal),0) from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no  and ln.class_code=511 and ln.status not in ('Active Charge-Off','closed','incomplete')) 'Total511nb',
        (select isnull(count(cur_bal),0) from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.class_code=511 and delq_dt is null and ln.status not in ('Active Charge-Off','closed','incomplete')) 'Sain511nb',
				(select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.class_code=511 and delq_dt is null and ln.status not in ('Active Charge-Off','closed','incomplete')) 'SainRES511nb',
				(select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=511 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 0 and 30) 'PAR0511nb',
				(select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=511 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 0 and 30) 'PAR0RES511nb',
				((select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=511 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 31 and 60)) 'PAR30511nb',
				((select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=511 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 61 and 90)) 'PAR60511nb',
				((select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=511 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 91 and 120)) 'PAR90511nb',
				((select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=511 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 121 and 180)) 'PAR120511nb',
				(select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=511 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) >180) 'PAR180511nb',
				((select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=511 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) >31)) 'PAR30RES511nb'
        
        from ov_control ov ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array(
					'Total511'=>number_format($row1['Total511'],3,',',' '),
					'Sain511'=>number_format($row1['Sain511'],3,',',' '),
					'SainRES511'=>number_format($row1['SainRES511'],3,',',' '),
					'PAR0511'=>number_format($row1['PAR0511'],3,',',' '),
					'PAR0RES511'=>number_format($row1['PAR0RES511'],3,',',' '),
					'PAR30511'=>number_format($row1['PAR30511'],3,',',' '),
					'PAR60511'=>number_format($row1['PAR60511'],3,',',' '),
					'PAR90511'=>number_format($row1['PAR90511'],3,',',' '),
					'PAR180511'=>number_format($row1['PAR180511'],3,',',' '),
					'PAR30RES511'=>number_format($row1['PAR30RES511'],3,',',' '),
					'PAR120511'=>number_format($row1['PAR120511'],3,',',' '),
					'Total511nb'=>number_format($row1['Total511nb'],0,',',' '),
					'Sain511nb'=>number_format($row1['Sain511nb'],0,',',' '),
					'SainRES511nb'=>number_format($row1['SainRES511nb'],0,',',' '),
					'PAR0511nb'=>number_format($row1['PAR0511nb'],0,',',' '),
					'PAR0RES511nb'=>number_format($row1['PAR0RES511nb'],0,',',' '),
					'PAR30511nb'=>number_format($row1['PAR30511nb'],0,',',' '),
					'PAR60511nb'=>number_format($row1['PAR60511nb'],0,',',' '),
					'PAR90511nb'=>number_format($row1['PAR90511nb'],0,',',' '),
					'PAR180511nb'=>number_format($row1['PAR180511nb'],0,',',' '),
					'PAR120511nb'=>number_format($row1['PAR120511nb'],0,',',' '),
					'PAR30RES511nb'=>number_format($row1['PAR30RES511nb'],0,',',' ')
					);
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}

function Provision_prood521_total_2017()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select 
				(select isnull(sum(cur_bal),0) from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no  and ln.class_code=521 and ln.status not in ('Active Charge-Off','closed','incomplete')) 'Total521',
        (select isnull(sum(cur_bal),0) from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.class_code=521 and delq_dt is null and ln.status not in ('Active Charge-Off','closed','incomplete')) 'Sain521',
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.class_code=521 and delq_dt is null and ln.status not in ('Active Charge-Off','closed','incomplete')) 'SainRES521',
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=521 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 0 and 30) 'PAR0521',
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=521 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 0 and 30) 'PAR0RES521',
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=521 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 31 and 60)) 'PAR30521',
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=521 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 61 and 90)) 'PAR60521',
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=521 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 91 and 120)) 'PAR90521',
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=521 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 121 and 180)) 'PAR120521',
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=521 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) >180) 'PAR180521',
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=521 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) >31)) 'PAR30RES521',
        (select isnull(count(cur_bal),0) from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no  and ln.class_code=521 and ln.status not in ('Active Charge-Off','closed','incomplete')) 'Total521nb',
        (select isnull(count(cur_bal),0) from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.class_code=521 and delq_dt is null and ln.status not in ('Active Charge-Off','closed','incomplete')) 'Sain521nb',
				(select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.class_code=521 and delq_dt is null and ln.status not in ('Active Charge-Off','closed','incomplete')) 'SainRES521nb',
				(select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=521 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 0 and 30) 'PAR0521nb',
				(select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=521 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 0 and 30) 'PAR0RES521nb',
				((select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=521 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 31 and 60)) 'PAR30521nb',
				((select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=521 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 61 and 90)) 'PAR60521nb',
				((select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=521 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 91 and 120)) 'PAR90521nb',
				((select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=521 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 121 and 180)) 'PAR120521nb',
				(select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=521 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) >180) 'PAR180521nb',
				((select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.status not in ('Active Charge-Off','closed','incomplete') and ln.class_code=521 and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) >31)) 'PAR30RES521nb'
        
        from ov_control ov ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array(
					'Total521'=>number_format($row1['Total521'],3,',',' '),
					'Sain521'=>number_format($row1['Sain521'],3,',',' '),
					'SainRES521'=>number_format($row1['SainRES521'],3,',',' '),
					'PAR0521'=>number_format($row1['PAR0521'],3,',',' '),
					'PAR0RES521'=>number_format($row1['PAR0RES521'],3,',',' '),
					'PAR30521'=>number_format($row1['PAR30521'],3,',',' '),
					'PAR60521'=>number_format($row1['PAR60521'],3,',',' '),
					'PAR90521'=>number_format($row1['PAR90521'],3,',',' '),
					'PAR180521'=>number_format($row1['PAR180521'],3,',',' '),
					'PAR30RES521'=>number_format($row1['PAR30RES521'],3,',',' '),
					'PAR120521'=>number_format($row1['PAR120521'],3,',',' '),
					'Total521nb'=>number_format($row1['Total521nb'],0,',',' '),
					'Sain521nb'=>number_format($row1['Sain521nb'],0,',',' '),
					'SainRES521nb'=>number_format($row1['SainRES521nb'],0,',',' '),
					'PAR0521nb'=>number_format($row1['PAR0521nb'],0,',',' '),
					'PAR0RES521nb'=>number_format($row1['PAR0RES521nb'],0,',',' '),
					'PAR30521nb'=>number_format($row1['PAR30521nb'],0,',',' '),
					'PAR60521nb'=>number_format($row1['PAR60521nb'],0,',',' '),
					'PAR90521nb'=>number_format($row1['PAR90521nb'],0,',',' '),
					'PAR180521nb'=>number_format($row1['PAR180521nb'],0,',',' '),
					'PAR120521nb'=>number_format($row1['PAR120521nb'],0,',',' '),
					'PAR30RES521nb'=>number_format($row1['PAR30RES521nb'],0,',',' ')
					);
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
		
function Provision_prood_total_2017()
		{
			include('../../../cnx/database.php');
			$pdo = Database6::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql="select 
				(select isnull(sum(cur_bal),0) from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no   and ln.status not in ('Active Charge-Off','closed','incomplete')) 'Total',
        (select isnull(sum(cur_bal),0) from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N'  and delq_dt is null and ln.status not in ('Active Charge-Off','closed','incomplete')) 'Sain',
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y'  and delq_dt is null and ln.status not in ('Active Charge-Off','closed','incomplete')) 'SainRES',
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete')  and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 0 and 30) 'PAR0',
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.status not in ('Active Charge-Off','closed','incomplete')  and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 0 and 30) 'PAR0RES',
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete')  and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 31 and 60)) 'PAR30',
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete')  and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 61 and 90)) 'PAR60',
								((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete')  and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 91 and 120)) 'PAR90',
        ((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete')  and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 121 and 180)) 'PAR120',
				(select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete')  and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) >180) 'PAR180',
				((select isnull(sum(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.status not in ('Active Charge-Off','closed','incomplete')  and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) >31)) 'PAR30RES',
        (select isnull(count(cur_bal),0) from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no   and ln.status not in ('Active Charge-Off','closed','incomplete')) 'Totalnb',
        (select isnull(count(cur_bal),0) from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N'  and delq_dt is null and ln.status not in ('Active Charge-Off','closed','incomplete')) 'Sainnb',
				(select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y'  and delq_dt is null and ln.status not in ('Active Charge-Off','closed','incomplete')) 'SainRESnb',
				(select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete')  and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 0 and 30) 'PAR0nb',
				(select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.status not in ('Active Charge-Off','closed','incomplete')  and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 0 and 30) 'nbPAR0',
				((select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete')  and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 31 and 60)) 'PAR30nb',
				((select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete')  and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 61 and 90)) 'PAR60nb',
								((select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete')  and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 91 and 120)) 'PAR90nb',
        ((select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete')  and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) between 121 and 180)) 'PAR120nb',
				(select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='N' and ln.status not in ('Active Charge-Off','closed','incomplete')  and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) >180) 'PAR180nb',
				((select isnull(count(cur_bal),0)  from ln_display dis,ln_acct ln where ln.acct_no=dis.acct_no and refinanced='Y' and ln.status not in ('Active Charge-Off','closed','incomplete')  and datediff(dd,dis.delq_dt,dateadd(dd,1,ov.last_to_dt ) ) >31)) 'PAR30RESnb'
        
        from ov_control ov ";
			$result = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$return = array();
			foreach ($result as $row1)
			$return[]=array(
					'Total'=>number_format($row1['Total'],3,',',' '),
					'Sain'=>number_format($row1['Sain'],3,',',' '),
					'SainRES'=>number_format($row1['SainRES'],3,',',' '),
					'PAR0'=>number_format($row1['PAR0'],3,',',' '),
					'PAR0RES'=>number_format($row1['PAR0RES'],3,',',' '),
					'PAR30'=>number_format($row1['PAR30'],3,',',' '),
					'PAR60'=>number_format($row1['PAR60'],3,',',' '),
					'PAR90'=>number_format($row1['PAR90'],3,',',' '),
					'PAR180'=>number_format($row1['PAR180'],3,',',' '),
					'PAR30RES'=>number_format($row1['PAR30RES'],3,',',' '),
					'Totalnb'=>number_format($row1['Totalnb'],0,',',' '),
					'Sainnb'=>number_format($row1['Sainnb'],0,',',' '),
					'SainRESnb'=>number_format($row1['SainRESnb'],0,',',' '),
					'PAR0nb'=>number_format($row1['PAR0nb'],0,',',' '),
					'nbPAR30'=>number_format($row1['PAR30nb'],0,',',' '),
					'PAR00nb'=>number_format($row1['PAR00nb'],0,',',' '),
					'PAR60nb'=>number_format($row1['PAR60nb'],0,',',' '),
					'PAR90nb'=>number_format($row1['PAR90nb'],0,',',' '),
					'PAR180nb'=>number_format($row1['PAR180nb'],0,',',' '),
					'nbPAR0'=>number_format($row1['nbPAR0'],0,',',' '),
					'PAR30RESnb'=>number_format($row1['PAR30RESnb'],0,',',' '),
					'PAR120'=>number_format($row1['PAR120'],3,',',' '),
					'PAR120nb'=>number_format($row1['PAR120nb'],0,',',' '),
					);
			header('Content-type: application/json');
			echo json_encode($return);
			Database::disconnect();
		}
?>