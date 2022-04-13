program _z_34_5;
VAR
   n:integer;
   s:real;
Begin
     read(n);
     s:=0;
     while s>=0 do
     begin
          s:=cos(cos(n*Pi/180)/sin(n*Pi/180));
          n:=n+1;
     end;
     write(s:0:3);
end.