using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Handifablabnyou
{
    #region Project
    public class Project
    {
        #region Member Variables
        protected int _id;
        protected string _name;
        protected DateTime _start_at;
        protected DateTime _end_at;
        protected DateTime _created_at;
        protected string _description;
        protected DateTime _deadline_at;
        protected unknown _price;
        protected string _picture;
        protected unknown _weight;
        protected unknown _width;
        protected unknown _length;
        protected unknown _height;
        protected int _fablab_id;
        #endregion
        #region Constructors
        public Project() { }
        public Project(string name, DateTime start_at, DateTime end_at, DateTime created_at, string description, DateTime deadline_at, unknown price, string picture, unknown weight, unknown width, unknown length, unknown height, int fablab_id)
        {
            this._name=name;
            this._start_at=start_at;
            this._end_at=end_at;
            this._created_at=created_at;
            this._description=description;
            this._deadline_at=deadline_at;
            this._price=price;
            this._picture=picture;
            this._weight=weight;
            this._width=width;
            this._length=length;
            this._height=height;
            this._fablab_id=fablab_id;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Name
        {
            get {return _name;}
            set {_name=value;}
        }
        public virtual DateTime Start_at
        {
            get {return _start_at;}
            set {_start_at=value;}
        }
        public virtual DateTime End_at
        {
            get {return _end_at;}
            set {_end_at=value;}
        }
        public virtual DateTime Created_at
        {
            get {return _created_at;}
            set {_created_at=value;}
        }
        public virtual string Description
        {
            get {return _description;}
            set {_description=value;}
        }
        public virtual DateTime Deadline_at
        {
            get {return _deadline_at;}
            set {_deadline_at=value;}
        }
        public virtual unknown Price
        {
            get {return _price;}
            set {_price=value;}
        }
        public virtual string Picture
        {
            get {return _picture;}
            set {_picture=value;}
        }
        public virtual unknown Weight
        {
            get {return _weight;}
            set {_weight=value;}
        }
        public virtual unknown Width
        {
            get {return _width;}
            set {_width=value;}
        }
        public virtual unknown Length
        {
            get {return _length;}
            set {_length=value;}
        }
        public virtual unknown Height
        {
            get {return _height;}
            set {_height=value;}
        }
        public virtual int Fablab_id
        {
            get {return _fablab_id;}
            set {_fablab_id=value;}
        }
        #endregion
    }
    #endregion
}