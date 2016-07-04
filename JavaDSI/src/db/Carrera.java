package db;

import java.sql.ResultSet;
import java.sql.SQLException;

public class Carrera {

    private String idCarrera;
    private Integer idFacultad;
    private String nombreCarrera;
    public Carrera(String idCarrera, Integer idFacultad, String nombreCarrera) {
	this.idCarrera = idCarrera;
	this.idFacultad = idFacultad;
	this.nombreCarrera = nombreCarrera;
    }
    public Carrera(ResultSet datos) {
	try {
	    this.idCarrera = datos.getString(1);
	    this.idFacultad = datos.getInt(2) == 0 ? null : datos.getInt(2);
	    this.nombreCarrera = datos.getString(3);
	} catch (SQLException e) {
	    // TODO Auto-generated catch block
	    e.printStackTrace();
	}

    }
    /**
     * @return the idCarrera
     */
    public String getIdCarrera() {
	return idCarrera;
    }
    /**
     * @return the idFacultad
     */
    public Integer getIdFacultad() {
	return idFacultad;
    }
    /**
     * @return the nombreCarrera
     */
    public String getNombreCarrera() {
	return nombreCarrera;
    }
    /* (non-Javadoc)
     * @see java.lang.Object#toString()
     */
    @Override
    public String toString() {
	return "Carrera [idCarrera=" + idCarrera + "]";
    }
    /* (non-Javadoc)
     * @see java.lang.Object#hashCode()
     */
    @Override
    public int hashCode() {
	final int prime = 31;
	int result = 1;
	result = prime * result + ((idCarrera == null) ? 0 : idCarrera.hashCode());
	return result;
    }
    /* (non-Javadoc)
     * @see java.lang.Object#equals(java.lang.Object)
     */
    @Override
    public boolean equals(Object obj) {
	if (this == obj) {
	    return true;
	}
	if (obj == null) {
	    return false;
	}
	if (!(obj instanceof Carrera)) {
	    return false;
	}
	Carrera other = (Carrera) obj;
	if (idCarrera == null) {
	    if (other.idCarrera != null) {
		return false;
	    }
	} else if (!idCarrera.equals(other.idCarrera)) {
	    return false;
	}
	return true;
    }




}
