program l2p22;
 var m,n,a,b:real;
  begin
    read(m,n);
    if (m > 0) and (n > 0)  then
     begin
      a:=5*sqrt((sqr(n)/4)+(sqr(m)/4))/3;
      b:=5*sqrt((sqr(n)/4)+(sqr(m)/4))/2;
     end;
    write(a:20:3,' ',b:20:3)
  end.

