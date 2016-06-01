package gui;

import java.sql.*;

public class Conexion {
	
	public static Connection con;
	
	public Conexion(){
		try{
		    Class.forName("com.mysql.jdbc.Driver");
		    con = DriverManager.getConnection("jdbc:mysql://localhost:3306/dsi01","root","");
		    //System.out.println("ok");
		}catch (Exception e){
			//System.out.println("fail");
		}
	}
	
	public static ResultSet ejecutarSQL(String sql){
		try {
			Statement stmt = con.createStatement();
			stmt.execute(sql);
			return stmt.getResultSet();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return null;
	}
	
}
