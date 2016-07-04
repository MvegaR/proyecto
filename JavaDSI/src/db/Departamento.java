package db;

import java.sql.ResultSet;
import java.sql.SQLException;

public class Departamento {
    private Integer idDepartamento;
    private Integer idFacultad;
    private String nombreDepartamento;
   
    public Departamento(Integer idDepartamento, Integer idFacultad, String nombreDepartamento) {
	this.idDepartamento = idDepartamento;
	this.idFacultad = idFacultad;
	this.nombreDepartamento = nombreDepartamento;
    }
    public Departamento(ResultSet datos) {
	try {
	    this.idDepartamento = datos.getInt(1);
	    this.idFacultad = datos.getInt(2) == 0 ? null : datos.getInt(2);;
	    this.nombreDepartamento = datos.getString(3);
	} catch (SQLException e) {
	    // TODO Auto-generated catch block
	    e.printStackTrace();
	}
    }
    /* (non-Javadoc)
     * @see java.lang.Object#toString()
     */
    @Override
    public String toString() {
	return "Departamento [idDepartamento=" + idDepartamento + "]";
    }
    /* (non-Javadoc)
     * @see java.lang.Object#hashCode()
     */
    @Override
    public int hashCode() {
	final int prime = 31;
	int result = 1;
	result = prime * result + ((idDepartamento == null) ? 0 : idDepartamento.hashCode());
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
	if (!(obj instanceof Departamento)) {
	    return false;
	}
	Departamento other = (Departamento) obj;
	if (idDepartamento == null) {
	    if (other.idDepartamento != null) {
		return false;
	    }
	} else if (!idDepartamento.equals(other.idDepartamento)) {
	    return false;
	}
	return true;
    }
    /**
     * @return the idDepartamento
     */
    public Integer getIdDepartamento() {
	return idDepartamento;
    }
    /**
     * @return the nombreDepartamento
     */
    public String getNombreDepartamento() {
	return nombreDepartamento;
    }
    public Integer getIdFacultad() {
	return idFacultad;
    }






}
