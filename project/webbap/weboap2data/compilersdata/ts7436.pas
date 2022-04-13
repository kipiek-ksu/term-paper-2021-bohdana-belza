Program kv_uravnenie;
var a, b, c, x1, x2, d: real;
begin
     read (a, b, c);
     if (a<>0)
          then begin
                 d:=sqr(b)-4*a*c;
                 if (d>=0) and (a<>05)
                   then begin
                             x1:=(-b+sqrt(d))/(2*a);
                             x2:=(-b-sqrt(d))/(2*a);
                             write (x1:2:3, ' ', x2:2:3);
                        end
                   else write ('NO ANSWERS');
            end
          else if b=0
                then write ('MANY ANSWERS')
                else begin
                          x1:=-c/b;
                          x2:=x1;
                          write (x1:2:3, ' ', x2:2:3);
                end;
end.