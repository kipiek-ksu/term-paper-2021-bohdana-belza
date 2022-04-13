Program Lab_3_67;
  var x,y,r:integer;
  begin
  read(x);
  read(y);
    if x>y then begin
    r:=x-y;
    write ('Mukola=',r);
    end
    else begin
    r:=y-x;
    write('Toluk=',r);
    end;
end.