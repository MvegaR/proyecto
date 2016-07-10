package db;
import java.sql.ResultSet;
import java.sql.SQLException;
public class Asignatura {

    private String idAsignatura;
    private String nombreAsignatura;
    private String idCarrera;
    private Integer anio;
    private Integer semestre;
    private Integer horaTeo, horaLabCom, horaAyudantia, 
    horaLabFisica, horaLabQuimica, horaLabRobotica, 
    horaLabMecanica, horaTallerArquitectura, horaTallerMadera, 
    horaGYM, horaAuditorio, horaLabRedes, horaLabElectronica, horaLabMaqElectricas;
    //FALTAN TIPOS DE HORA!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    public Asignatura(String idAsignatura, String idCarrera, String nombreAsignatura,
	    Integer anio, Integer semestre, Integer horaTeo, Integer horaLabCom, Integer horaAyudantia, 
	    Integer horaLabFisica, Integer horaLabQuimica, Integer horaLabRobotica, 
	    Integer horaLabMecanica, Integer horaTallerArquitectura, Integer horaTallerMadera, Integer horaGYM,
	    Integer horaAuditorio, Integer horaLabRedes, Integer horaLabElectronica, Integer horaLabMaqElectricas) {
	this.idAsignatura = idAsignatura;
	this.idCarrera = idCarrera;
	this.nombreAsignatura = nombreAsignatura;
	this.anio = anio;
	this.semestre = semestre;
	this.horaTeo = horaTeo;
	this.horaLabCom = horaLabCom;
	this.horaAyudantia = horaAyudantia;
	this.horaLabFisica = horaLabFisica;
	this.horaLabQuimica = horaLabQuimica;
	this.horaLabRobotica = horaLabRobotica;
	this.horaLabMecanica = horaLabMecanica;
	this.horaTallerArquitectura = horaTallerArquitectura;
	this.horaTallerMadera = horaTallerMadera;
	this.horaGYM = horaGYM;
	this.horaAuditorio = horaAuditorio;
	this.horaLabRedes = horaLabRedes;
	this.horaLabElectronica = horaLabElectronica;
	this.horaLabMaqElectricas = horaLabMaqElectricas;

    }
    //Contructor para sql
    public Asignatura(ResultSet datos) {
	try {
	    this.idAsignatura = datos.getString(1);
	    this.idCarrera = datos.getString(2);
	    this.nombreAsignatura = datos.getString(3);
	    this.anio = datos.getInt(4);
	    this.semestre = datos.getInt(5);
	    this.horaTeo = datos.getInt(6);
	    this.horaLabCom = datos.getInt(7);
	    this.horaAyudantia = datos.getInt(8);
	    this.horaLabFisica = datos.getInt(9);
	    this.horaLabQuimica = datos.getInt(10);
	    this.horaLabRobotica = datos.getInt(11);
	    this.horaLabMecanica = datos.getInt(12);
	    this.horaTallerArquitectura = datos.getInt(13);
	    this.horaTallerMadera = datos.getInt(14);
	    this.horaGYM = datos.getInt(15);
	    this.horaAuditorio = datos.getInt(16);
	    this.horaLabRedes = datos.getInt(17);
	    this.horaLabElectronica = datos.getInt(18);
	    this.horaLabMaqElectricas = datos.getInt(19);
	} catch (SQLException e) {
	    e.printStackTrace();
	}
    }

    /**
     * @return the idAsignatura
     */
    public String getIdAsignatura() {
	return idAsignatura;
    }

    /**
     * @return the nombreAsignatura
     */
    public String getNombreAsignatura() {
	return nombreAsignatura;
    }

    /**
     * @return the anio
     */
    public Integer getAnio() {
	return anio;
    }

    /**
     * @return the semestre
     */
    public Integer getSemestre() {
	return semestre;
    }

    /**
     * @return the horaTeo
     */
    public Integer getHoraTeo() {
	return horaTeo;
    }

    /**
     * @return the horaLabCom
     */
    public Integer getHoraLabCom() {
	return horaLabCom;
    }

    /**
     * @return the horaAyudantia
     */
    public Integer getHoraAyudantia() {
	return horaAyudantia;
    }

    /**
     * @return the horaLabFisica
     */
    public Integer getHoraLabFisica() {
	return horaLabFisica;
    }

    /**
     * @return the horaLabQuimica
     */
    public Integer getHoraLabQuimica() {
	return horaLabQuimica;
    }

    /**
     * @return the horaLabRobotica
     */
    public Integer getHoraLabRobotica() {
	return horaLabRobotica;
    }

    /**
     * @return the horaLabMecanica
     */
    public Integer getHoraLabMecanica() {
	return horaLabMecanica;
    }

    /**
     * @return the horaTallerArquitectura
     */
    public Integer getHoraTallerArquitectura() {
	return horaTallerArquitectura;
    }

    /**
     * @return the horaTallerMadera
     */
    public Integer getHoraTallerMadera() {
	return horaTallerMadera;
    }
    
    /**
     * @return the idCarrera
     */
    public String getIdCarrera() {
	return idCarrera;
    }

    /**
     * @return the horaGYM
     */
    public Integer getHoraGYM() {
	return horaGYM;
    }

    /**
     * @return the horaAuditorio
     */
    public Integer getHoraAuditorio() {
	return horaAuditorio;
    }
    
    public Integer getHoraLabElectronica() {
	return horaLabElectronica;
    }
    public Integer getHoraLabMaqElectricas() {
	return horaLabMaqElectricas;
    }
    public Integer getHoraLabRedes() {
	return horaLabRedes;
    }

    /* (non-Javadoc)
     * @see java.lang.Object#toString()
     */
    @Override
    public String toString() {
	return "Asignatura [idAsignatura=" + idAsignatura + "]";
    }

    /* (non-Javadoc)
     * @see java.lang.Object#hashCode()
     */
    @Override
    public int hashCode() {
	final int prime = 31;
	int result = 1;
	result = prime * result + ((idAsignatura == null) ? 0 : idAsignatura.hashCode());
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
	if (!(obj instanceof Asignatura)) {
	    return false;
	}
	Asignatura other = (Asignatura) obj;
	if (idAsignatura == null) {
	    if (other.idAsignatura != null) {
		return false;
	    }
	} else if (!idAsignatura.equals(other.idAsignatura)) {
	    return false;
	}
	return true;
    }



}
