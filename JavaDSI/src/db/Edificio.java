package db;

import java.sql.ResultSet;
import java.sql.SQLException;

public class Edificio {

    private String idEdificio;
    private Integer idFacultad;
    private String nombreEdificio;
    public Edificio(String idEdificio, Integer idFacultad, String nombreEdificio) {

	this.idEdificio = idEdificio;
	this.idFacultad = idFacultad;
	this.nombreEdificio = nombreEdificio;
    }
    public Edificio(ResultSet datos) {
	try {
	    this.idEdificio = datos.getString(1);
	    this.idFacultad = datos.getInt(2) == 0 ? null : datos.getInt(2);
	    this.nombreEdificio = datos.getString(3);
	} catch (SQLException e) {
	    // TODO Auto-generated catch block
	    e.printStackTrace();
	}
    }
    /**
     * @return the idEdificio
     */
    public String getIdEdificio() {
	return idEdificio;
    }
    /**
     * @return the idFacultad
     */
    public Integer getIdFacultad() {
	return idFacultad;
    }
    /**
     * @return the nombreEdificio
     */
    public String getNombreEdificio() {
	return nombreEdificio;
    }
    /* (non-Javadoc)
     * @see java.lang.Object#toString()
     */
    @Override
    public String toString() {
	return "Edificio [idEdificio=" + idEdificio + "]";
    }
    /* (non-Javadoc)
     * @see java.lang.Object#hashCode()
     */
    @Override
    public int hashCode() {
	final int prime = 31;
	int result = 1;
	result = prime * result + ((idEdificio == null) ? 0 : idEdificio.hashCode());
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
	if (!(obj instanceof Edificio)) {
	    return false;
	}
	Edificio other = (Edificio) obj;
	if (idEdificio == null) {
	    if (other.idEdificio != null) {
		return false;
	    }
	} else if (!idEdificio.equals(other.idEdificio)) {
	    return false;
	}
	return true;
    }






}
