import java.sql.*;

public class JDBC {
    public static void main(String[] args) throws Exception{
        String driverClassName = "com.mysql.jdbc.Driver";
        String url = "jdbc:mysql://localhost/jdbc";
        String user = "root";
        String pwd = "";
        Class.forName(driverClassName).newInstance();
        Connection con = DriverManager.getConnection(url,user,pwd);
        Statement st = con.createStatement();
        String st1 = "create table employees(name varchar(20),blood_group int,age float,email varchar(20),aadhar_number int(12)";
        st.executeUpdate(st1);
        st.close();
        con.close();

}