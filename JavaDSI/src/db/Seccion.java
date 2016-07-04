package db;

import java.sql.ResultSet;
import java.sql.SQLException;

public class Seccion {

    private String idSeccion;
    private String idDocente;
    private String idAsignatura;
    private Integer cupo;

    public Seccion(String idSeccion, String idDocente, String idAsignatura, Integer cupo) {
	this.idSeccion = idSeccion;
	this.idDocente = idDocente;
	this.idAsignatura = idAsignatura;
	this.cupo = cupo;
    }
    public Seccion(ResultSet datos) {
	try {
	    this.idSeccion = datos.getString(1);
	    this.idDocente = datos.getString(2);
	    this.idAsignatura = datos.getString(3);
	    this.cupo = datos.getInt(4);
	} catch (SQLException e) {
	    // TODO Auto-generated catch block
	    e.printStackTrace();
	}
    }
    /**
     * @return the idSeccion
     */
    public String getIdSeccion() {
	return idSeccion;
    }
    /**
     * @return the idDocente
     */
    public String getIdDocente() {
	return idDocente;
    }
    /**
     * @return the idAsignatura
     */
    public String getIdAsignatura() {
	return idAsignatura;
    }
    /**
     * @return the cupo
     */
    public Integer getCupo() {
	return cupo;
    }
    /* (non-Javadoc)
     * @see java.lang.Object#toString()
     */
    @Override
    public String toString() {
	return "Seccion [idSeccion=" + idSeccion + "]";
    }
    /* (non-Javadoc)
     * @see java.lang.Object#hashCode()
     */
    @Override
    public int hashCode() {
	final int prime = 31;
	int result = 1;
	result = prime * result + ((idSeccion == null) ? 0 : idSeccion.hashCode());
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
	if (!(obj instanceof Seccion)) {
	    return false;
	}
	Seccion other = (Seccion) obj;
	if (idSeccion == null) {
	    if (other.idSeccion != null) {
		return false;
	    }
	} else if (!idSeccion.equals(other.idSeccion)) {
	    return false;
	}
	return true;
    }





}
