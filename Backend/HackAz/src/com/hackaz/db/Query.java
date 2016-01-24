package com.hackaz.db;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

public class Query {

	String url, dbName, driver, sql;

	Query() {
		url = "jdbc:mysql://localhost:3306/";
		dbName = "hackaz";
		driver = "com.mysql.jdbc.Driver";

	}

	public List<Integer> matchuser(String username) {
		List<Integer> joblist = new ArrayList();

		try {
			Connection conn = null;
			Class.forName(driver).newInstance();
			conn = DriverManager.getConnection(url + dbName, "root", "Security@18");

			sql = "SELECT skills,salary from user WHERE email = '" + username + "'";
			Statement st = conn.createStatement();
			ResultSet rs = st.executeQuery(sql);

			// conn.commit();
			while (rs.next()) {
				String skills = rs.getString(1);
				List<String> skilllist = Arrays.asList(skills.split("\\s*,\\s*"));
				int sal = rs.getInt(2);

				int count = skilllist.size();
				if (count == 1) {
					PreparedStatement pst = (PreparedStatement) conn
							.prepareStatement("select jobid from jobs where requirment=? and minsal>=?");
					// System.out.println("HI");
					pst.setString(1, skilllist.get(1));
					pst.setInt(3, sal);
					ResultSet rs2 = pst.executeQuery();
					// System.out.println("HI");

					while (rs2.next()) {
						// System.out.println("HI");
						joblist.add(rs2.getInt(1));

					}
				} else if (count == 2) {
					PreparedStatement pst = (PreparedStatement) conn.prepareStatement(
							"select jobid from jobs where requirment=? or requirment=? and minsal>=?");
					// System.out.println("HI");
					pst.setString(1, skilllist.get(1));
					pst.setString(2, skilllist.get(1));
					pst.setInt(3, sal);
					ResultSet rs2 = pst.executeQuery();
					// System.out.println("HI");

					while (rs2.next()) {
						// System.out.println("HI");
						joblist.add(rs2.getInt(1));

					}

				} else if (count == 3) {
					PreparedStatement pst = (PreparedStatement) conn.prepareStatement(
							"select jobid from jobs where requirment=? or requirment=? or requirment=? and minsal>=?");
					pst.setString(1, skilllist.get(1));
					pst.setString(2, skilllist.get(1));
					pst.setString(3, skilllist.get(1));
					pst.setInt(4, sal);
					ResultSet rs2 = pst.executeQuery();
					while (rs2.next()) {
						joblist.add(rs2.getInt(1));
					}
				}

				String sqlr = "SELECT jobidbad,jobidgood from user WHERE email = '" + username + "'";
				Statement str = conn.createStatement();
				ResultSet rsr = str.executeQuery(sqlr);
				while (rsr.next()) {
					String jobr = rsr.getString(1);
					if (jobr != null) {
						List<String> remove = Arrays.asList(jobr.split("\\s*,\\s*"));

						for (int i = 0; i < remove.size(); i++) {
							Integer x = Integer.parseInt(remove.get(i));
							joblist.remove(x);
						}
					}
					jobr = rsr.getString(2);
					if (jobr != null) {
						List<String> remove = Arrays.asList(jobr.split("\\s*,\\s*"));

						for (int i = 0; i < remove.size(); i++) {
							Integer x = Integer.parseInt(remove.get(i));
							joblist.remove(x);
						}
					}
				}
			}
			System.out.println("sending jobid");
			return joblist;

		} catch (

		Exception e)

		{
			System.out.println(e);
			joblist.add(000);
			System.out.println("Error");
			return joblist;
		}

	}

	public List<String> matchcompany(int jobid) {
		List<String> userlist = new ArrayList();

		try {
			Connection conn = null;
			Class.forName(driver).newInstance();
			conn = DriverManager.getConnection(url + dbName, "root", "Security@18");

			sql = "SELECT requirment from jobs WHERE jobid = " + jobid;
			Statement st = conn.createStatement();
			ResultSet rs = st.executeQuery(sql);

			// conn.commit();
			while (rs.next()) {
				String skills = rs.getString(1);
				String skill1 = "%" + skills + ",%";
				String skill2 = "%" + skills;
				String sql1 = "SELECT email FROM user WHERE skills LIKE '" + skill1 + "' or skills LIKE '" + skill2
						+ "'";

				Statement st1 = conn.createStatement();
				ResultSet rs2 = st1.executeQuery(sql1);

				while (rs2.next()) {
					userlist.add(rs2.getString(1));
				}
			}
			String sqlr = "SELECT gooduser,baduser from jobs WHERE jobid = " + jobid;
			Statement str = conn.createStatement();
			ResultSet rsr = str.executeQuery(sqlr);
			while (rsr.next()) {
				String usr = rsr.getString(1);
				if (usr != null) {
					List<String> remove = Arrays.asList(usr.split("\\s*,\\s*"));

					for (int i = 0; i < remove.size(); i++) {
						userlist.remove(remove.get(i));
					}
				}
				usr = rsr.getString(2);
				if (usr != null) {
					List<String> remove = Arrays.asList(usr.split("\\s*,\\s*"));

					for (int i = 0; i < remove.size(); i++) {
						userlist.remove(remove.get(i));
					}
				}
			}

			System.out.println("sending userid");
			return userlist;

		} catch (

		Exception e)

		{
			System.out.println(e);
			userlist.add("Error");
			System.out.println("Error");
			return userlist;
		}
	}

}
