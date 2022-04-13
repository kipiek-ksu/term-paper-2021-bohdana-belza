Program LB10_11;
Type a=record
      sername:string[12];
      name:string[12];
      firstname:string[12];
      street:string[12];
      house:byte;
      flat:byte;
      istel:0..1;
      tel:string[12]
     end;
Var s: array[1..10] of a;
		n,i:byte;
begin
    Readln(n);
    For i:=1 to n do begin
    	readln(s[i].sername);
      readln(s[i].name);
      readln(s[i].firstname);
      readln(s[i].street);
      readln(s[i].house);
      readln(s[i].flat);
      readln(s[i].istel);
      if s[i].istel=1 then
      readln(s[i].tel);
    end;
    For i:=1 to n do
    	if s[i].istel=0 then begin
      	Writeln(s[i].sername);
        Writeln(s[i].name);
        writeln(s[i].firstname);
        writeln(s[i].street);
        writeln(s[i].house);
        writeln(s[i].flat);
      end;
end.