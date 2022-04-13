Program R4Z4;
Var x,y,z,r:integer;

Begin
     read(x,y,z);
     if x>y
        then
            if y>z
               then
                   r:=z
               else
                   r:=y
        else
            if x>z
               then
                   r:=z
               else
                   r:=x;
     write(r);

End.