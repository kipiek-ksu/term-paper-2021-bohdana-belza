program t3_z7;
var a,b,r:integer;
    procedure (x,y:integer; var z:integer);
          begin
             if x>y then z:=x;
             if x<y then z:=y;
             if x=y then x:=0;
          end;
   begin
        read(a,b);
        chis(a,b,r);
        write(r);
   end.